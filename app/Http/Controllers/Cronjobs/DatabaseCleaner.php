<?php

namespace App\Http\Controllers\Cronjobs;

ini_set("memory_limit", -1);

set_time_limit(0);

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Influencers;
use App\Account;
use Exception;

use function GuzzleHttp\json_encode;

class DatabaseCleaner extends Controller
{
    private $_next_token = null;

    private $_keywords;

    private $_platform_id = 1;

    private $_location;
    private $_engagement_rate;
    private $_followers;

    private $_category;

    private $URLs = [
        'standard' => 'search/tweets',
        'premium-30-sandbox' => 'tweets/search/30day/Viralget30Days',
        'premium-30-fullarchive' => 'tweets/search/fullarchive/FullArchive',
        'premium-30-paid' => 'tweets/search/30day/30dayspremium',
        'get-tweets' => 'statuses/user_timeline'
    ];

    private $_Parameters = [
        "get-influencer-tweets" => [
            "include_rts" => true,
            "count" => 200,
            "tweet_mode" => "extended",
            // "max_id" => "1269202687398227968",
        ],

        "standard" => [
            "q" => "tech",
            "count" => 100,
            "result_type" => "mixed",
            "tweet_mode" => "extended"
        ],
    ];

    private $_connection;

    function __construct()
    {
        $this->_connection = new TwitterOAuth(
            env('TWITTER_CONSUMER_KEY'),
            env('TWITTER_CONSUMER_SECRET'),
            env('TWITTER_ACCESS_TOKEN'),
            env('TWITTER_TOKEN_SECRET')
        );
    }

    function getTwitterTimeStamp($twitter_time)
    {
        $date = date_create($twitter_time);
        $timestamp = date_format($date, "U");
        return $timestamp;
    }

    function index()
    {
        $accounts = new Account;
        $accounts = $accounts->all();
        foreach ($accounts as $account) {
            $this->_platform_id = $account->platform_id;
            $this->_category = $account->category_id;

            $this->checkTweets($account->handle);
        }
    }

    function calculateEngagementRate($engagement_data)
    {
        $engagementRate = ($engagement_data["followers"] === 0) ? 0 : ($engagement_data["likes"] / 200 + $engagement_data["retweets"] / 200) / ($engagement_data["followers"] ?? 0);
        $engagementRate = round($engagementRate, 2);
        return $engagementRate;
    }

    function checkFollowers($followersCount)
    {
        if ($followersCount > 5000) { // adjusted should be 5000
            return true;
        }
    }

    function setNextToken($next_token)
    {
        return $this->_next_token = $next_token;
    }


    function checkTweets($screen_name)
    {
        $this->_Parameters["get-influencer-tweets"]["screen_name"] = $screen_name;

        try {
            $influencerTweets = $this->twitterFetch($this->URLs['get-tweets'], $this->_Parameters["get-influencer-tweets"]);
        } catch (\Exception $e) {
            dd($screen_name, $e->getMessage());
            // return $e->getMessage();
        }
        // return json_encode($influencerTweets);
        $counter = 0;

        $retweets_count = 0;
        $likes_count = 0;
        $followers_count = 0;
        $profile_data = '';
        $twitter_id = '';

        if (is_array($influencerTweets) > 0) {
            foreach ($influencerTweets as $tweets) {
                $retweets_count += $tweets->retweet_count ?? 0;
                $likes_count += $tweets->favorite_count ?? 0;
                $followers_count = $tweets->user->followers_count;
                $followers_count = $tweets->user->followers_count;
                $this->getInfluencerLocation($tweets->user->location);
                $twitter_id = $tweets->user->id;
                $profile_data = $tweets->user;
            }
        }

        $engagement_data = [
            "followers" => $followers_count ?? 0,
            "retweets" => $retweets_count,
            "likes" => $likes_count,
        ];

        $engagement_rate = $this->calculateEngagementRate($engagement_data);

        $this->setInfluencerEngagementRate($engagement_rate);
        $this->setInfluencerFollowers($followers_count);

        $data = [
            "twitter_id" => $twitter_id,
            "handle" => $screen_name,
            "followers" => $this->_followers,
            "engagement_rate" => $this->_engagement_rate,
            "location" => $this->_location,
            "profile_data" => $profile_data,
            "platform_id" => $this->_platform_id,
            "category_id" => $this->_category,
        ];

        // return $data;
        //save if not exists
        $this->handleExists($data);
    }

    function getInfluencerLocation($location)
    {
        $state = explode(",", $location);
        $this->setInfluencerLocation($state[0]);
        return $state[0];
    }

    function matchesInfluencerLocation($location)
    {
        // $location_keywords = ["Lekki", "Ajah", "Nigeria", "Ibadan", "Ikoyi", "Lagos", "Abuja"];

        if (strpos($location, "NG") !== false) {
            return true;
        }

        foreach ($this->_keywords->getLocations() as $eachLocation) {
            if (stripos($location, $eachLocation) !== false) {
                return true;
            }
            // return $this->checkNoneCodeLocations($location, $eachLocation);
        }

        return false;
    }

    // I dont see the use for this function, may delete soon
    function checkNoneCodeLocations($location, $eachLocation)
    {
        if ($this->analyseEachInfluencerLocation($location, $eachLocation) || $this->analyseEachInfluencerLocation($location, strtolower($eachLocation))) {
            return true;
        }
    }

    function setInfluencerLocation($location)
    {
        $this->_location = $location;
    }

    function setInfluencerEngagementRate($engagementRate)
    {
        if ($engagementRate < 0.02) {
            return $this->_engagement_rate = "low";
        }

        if ($engagementRate < 0.09 && $engagementRate > 0.02) {
            return $this->_engagement_rate = "good";
        }

        if ($engagementRate < 0.33 && $engagementRate > 0.09) {
            return $this->_engagement_rate = "high";
        }

        if ($engagementRate > 0.33) {
            return $this->_engagement_rate = "very high";
        }
    }

    function setInfluencerFollowers($followers)
    {
        $this->_followers = $followers;
    }

    function analyseEachInfluencerTweet($tweets, $keywords)
    {
        if (stripos($tweets, $keywords) !== false) {
            return true;
        }
    }

    function analyseEachInfluencerLocation($location, $keywords)
    {
        if (stripos($location, $keywords) !== false) {
            return true;
        }
    }

    function areTweetsRelevant($counter)
    {
        if ($counter > 10) { // adjusted, should be 60
            return true;
        }
    }

    function handleExists($data = [])
    {
        $user = Influencers::where('handle', '=', $data['handle'])->first();
        if ($user) {
            // Plan to do an update to user profile 
            Influencers::where('handle', $data['handle'])->delete();

            // dd($user);
            // return false;
        }
        $this->saveData($data);
    }

    function saveData($data)
    {
        $accounts = new Influencers;
        $accounts->twitter_id = $data['twitter_id'];
        $accounts->handle = $data['handle'];
        $accounts->profile_data = json_encode($data['profile_data']);
        $accounts->followers = $data['followers'];
        $accounts->engagement_rate = $data['engagement_rate'];
        $accounts->location = $data['location'];
        $accounts->platform_id = $data['platform_id'];
        $accounts->category_id = $data['category_id'];

        try {
            $accounts->save();
            // return response()->json([
            //     'message' => "data saved successfully",
            //     "status" => "success"
            // ], 200);
        } catch (Exception $e) {
            dd($e->getMessage());
            // return $e->getMessage();
            // return response()->json([
            //     'message' => $data['handle'] . ' ' . $e->getMessage(),
            // ], 500);
        }
    }

    function twitterFetch($url, $params = [])
    {
        try {
            return $this->_connection->get($url, $params);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
