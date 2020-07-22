<?php

namespace App\Http\Controllers\Cronjobs;

ini_set("memory_limit", -1);

set_time_limit(0);

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

    function index()
    {
        $accounts = new Influencers;
        $accounts = $accounts->all();
        
        foreach ($accounts as $account) {
            $this->setPlatformId($account->platform_id);
            $this->setCategoryId($account->category_id);

            $this->checkTweets($account->handle);
        }

        return 'done';
    }

    public function setPlatformId($platform_id)
    {
        $this->_platform_id = $platform_id;
    }

    public function setCategoryId($category_id)
    {
        $this->_category = $category_id;
    }

    function calculateEngagementRate($engagement_data)
    {
        $reach = $engagement_data["followers"] * 0.3;
        $impressions = round($reach * $engagement_data["no_of_tweets"], 1);
        $total_engagements = 0;

        if($impressions != 0 || $impressions != 0.0){
            $total_engagements = (($engagement_data["likes"] + $engagement_data["retweets"] + $engagement_data["quotes"]) / $impressions) * 1000;
        }
        
        $engagementRate = round($total_engagements, 1);
        return $engagementRate;
    }

    function checkTweets($screen_name)
    {
        $this->_Parameters["get-influencer-tweets"]["screen_name"] = $screen_name;

        try {
            $influencerTweets = $this->twitterFetch($this->URLs['get-tweets'], $this->_Parameters["get-influencer-tweets"]);
        } catch (\Exception $e) {
            dd($screen_name, $e->getMessage());
        }

        // return json_encode($influencerTweets);

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
                $influencer_location = $this->getInfluencerLocation($tweets->user->location);
                $this->setInfluencerLocation($influencer_location);

                $twitter_id = $tweets->user->id;
                $profile_data = $tweets->user;
            }
        }
        // else{
        //     // $this->deleteInfluencer($screen_name);
        //     dd($screen_name);
        // }

        // $no_of_tweets = count($influencerTweets);
        $no_of_tweets = 200;

        $engagement_data = [
            "followers" => $followers_count ?? 0,
            "retweets" => $retweets_count,
            "likes" => $likes_count,
            "quotes" => 0,
            "no_of_tweets" => $no_of_tweets,
        ];

        $engagement_rate_value = $this->calculateEngagementRate($engagement_data);

        $this->setInfluencerEngagementRate($engagement_rate_value);

        $influencer_data = [
            "twitter_id" => $twitter_id,
            "handle" => $screen_name,
            "followers" => $followers_count,
            "engagement_rate" => $this->_engagement_rate,
            "engagement_rate_value" => $engagement_rate_value,
            "location" => $this->_location,
            "profile_data" => $profile_data,
            "platform_id" => $this->_platform_id,
            "category_id" => $this->_category,
        ];

        $this->handleExists($influencer_data);
    }

    function getInfluencerLocation($location)
    {
        $state = explode(",", $location);
        return $state[0];
    }

    function setInfluencerLocation($location)
    {
        $this->_location = $location;
    }

    function setInfluencerEngagementRate($engagementRate)
    {
        if ($engagementRate <= 0.9) {
            return $this->_engagement_rate = "low";
        }
        
        if ($engagementRate >= 1.0 && $engagementRate <= 2.9) {
            return $this->_engagement_rate = "good";
        }

        if ($engagementRate >= 3.0 && $engagementRate <= 9.9) {
            return $this->_engagement_rate = "high";
        }

        if ($engagementRate >= 10.0) {
            return $this->_engagement_rate = "very high";
        }
        echo 'Engagement value  ' . $engagementRate . '  Engagment Grade ' . $this->_engagement_rate . '<br>';
    }

    function handleExists($data = [], $save = false)
    {
        // $user = Influencers::where('handle', '=', $data['handle'])->first();
        // if ($user) {
        //     Influencers::where('handle', $data['handle'])->delete();
        // }

        if ($save) {
            $this->saveData($data);
        } else {
            $this->updateData($data);
        }
    }

    function updateData($data)
    {
        $accounts = new Influencers;
        
        try {
            $accounts->where('handle', $data['handle'])->update([
                'twitter_id' => $data['twitter_id'],
                'handle' => $data['handle'],
                'profile_data' => json_encode($data['profile_data']),
                'followers' => $data['followers'],
                'engagement_rate' => $data['engagement_rate'],
                'engagement_rate_value' => $data['engagement_rate_value'],
                'location' => $data['location'],
                'platform_id' => $data['platform_id'],
                'category_id' => $data['category_id'],
            ]);

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    function saveData($data)
    {
        $accounts = new Influencers;
        $accounts->twitter_id = $data['twitter_id'];
        $accounts->handle = $data['handle'];
        $accounts->profile_data = json_encode($data['profile_data']);
        $accounts->followers = $data['followers'];
        $accounts->engagement_rate = $data['engagement_rate'];
        $accounts->engagement_rate_value = $data['engagement_rate_value'];
        $accounts->location = $data['location'];
        $accounts->platform_id = $data['platform_id'];
        $accounts->category_id = $data['category_id'];

        try {
            $accounts->save();
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    
    function deleteInfluencer($screen_name)
    {
        $accounts = new Influencers;
        
        try {
            $accounts->where('handle', $screen_name)->delete();
        } catch (Exception $e) {
            dd($e->getMessage());
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
