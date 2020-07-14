<?php

namespace App\Http\Controllers\Cronjobs;

ini_set("memory_limit", -1);

set_time_limit(0);

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Http\Controllers\Cronjobs\keywords;
use App\Influencers;
use Exception;

use function GuzzleHttp\json_encode;

class TwitterCronHandler extends Controller
{
    private $_next_token = null;

    private $_keywords;

    private $prepared_keywords = "";

    private $_platform_id = 1;

    private $_location;
    private $_engagement_rate;
    private $_followers;

    private $_category;

    private $_temporary_parameters;

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
        $this->_category = request()->category;
        $this->_connection = new TwitterOAuth(
            env('TWITTER_CONSUMER_KEY'),
            env('TWITTER_CONSUMER_SECRET'),
            env('TWITTER_ACCESS_TOKEN'),
            env('TWITTER_TOKEN_SECRET')
        );

        $this->_keywords = new Keywords();
    }

    function getTwitterTimeStamp($twitter_time)
    {
        $date = date_create($twitter_time);
        $timestamp = date_format($date, "U");
        return $timestamp;
    }

    function index() //Rename to search
    {
        $page = 0;
        $next = "";
        $searching = true;

        while ($searching) {
            if ($page === 0) {
                $this->_temporary_parameters = [
                    "query" => "place_country: NG (tech OR coding OR software OR developer OR computer OR programming OR technology OR data science OR artificial intelligence OR software engineer) -discount -promo -cash -sale -game -bet",
                    "maxResults" => 500,
                ];
            } else {
                $this->_temporary_parameters = [
                    "query" => "place_country: NG (tech OR coding OR software OR developer OR computer OR programming OR technology OR data science OR artificial intelligence OR software engineer) -discount -promo -cash -sale -game -bet",
                    "maxResults" => 500,
                    "next" => $next
                ];
            }

            // For testing // End by pages
            if ($page === 1) {
                $searching = false;
                return json_encode('done');
            }

            $page++;

            try {
                $tweets = $this->twitterFetch($this->URLs['premium-30-paid'], $this->_temporary_parameters);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
            return json_encode($tweets);

            if (isset($tweets->results)) {
                foreach ($tweets->results as $status) {
                    if ($this->checkFollowers($status->user->followers_count)) {
                        $this->setInfluencerFollowers($status->user->followers_count);
                        $this->getInfluencerLocation($status->user->location);
                        $this->checkTweets($status->user->screen_name);
                    }
                }
            }

            // return json_encode($tweets);

            // For live data
            if (isset($tweets->next)) {
                $next = $tweets->next;
            } else {
                $searching = false;
                return json_encode($tweets);
            }
        }

        return;
        ///////////////////////////////////////////////////////////////////
        $start = 0;
        $end = 10;
        $page = 0;

        $is_searching = true;

        $keyword_array = $this->_keywords->getKeywords($this->_category)['keywords'];
        $array_count = count($keyword_array);

        while ($is_searching) {
            $sliced_array = array_slice($keyword_array, $start, $end);

            if ($page === 0) {
                $this->_temporary_parameters = [
                    "query" => $this->prepare_keywords($sliced_array),
                    "maxResults" => 100,
                ];
            } else {
                $this->_temporary_parameters = [
                    "query" => $this->prepare_keywords($sliced_array),
                    "maxResults" => 100,
                    "next" => $this->_next_token
                ];
            }

            try {
                $tweets = $this->twitterFetch($this->URLs['premium-30-sandbox'], $this->_temporary_parameters);
            } catch (\Exception $e) {
                return $e->getMessage();
            }

            $page++;

            // return json_encode($tweets);

            if (isset($tweets->results)) {
                foreach ($tweets->results as $status) {
                    if ($this->checkFollowers($status->user->followers_count)) {
                        $this->setInfluencerFollowers($status->user->followers_count);
                        $this->getInfluencerLocation($status->user->location);
                        $this->checkTweets($status->user->screen_name);
                    }
                }
            }

            if (isset($tweets->next)) {
                $this->setNextToken($tweets->next);
            }

            if (!isset($tweets->next) && $start + $end  < $array_count) {
                $start += $end;
                $page = 0;
            }

            if ($page === 40) {
                $is_searching = false;
                return json_encode($tweets);
            }

            //Stop searching for keywords after keyword array has been exhausted
            if (!isset($tweets->next) && $start + $end  >= $array_count) {
                $is_searching = false;
                return json_encode($tweets);
            }
        }
    }

    function prepare_keywords($sliced_array)
    {
        $this->prepared_keywords = "";
        foreach ($sliced_array as $keyword) {
            $this->prepared_keywords .= $keyword . " OR ";
        }
        $remove_ends = "place_country: NG lang: en (" . substr($this->prepared_keywords, 0, -4) . ")";
        return $remove_ends;
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
            return $e->getMessage();
        }

        $counter = 0;

        $retweets_count = 0;
        $likes_count = 0;
        $followers_count = 0;
        $profile_data = [];

        if (is_array($influencerTweets) > 0) {
            foreach ($influencerTweets as $tweets) {
                $retweets_count += $tweets->retweet_count ?? 0;
                $likes_count += $tweets->favorite_count ?? 0;
                $followers_count = $tweets->user->followers_count;

                foreach ($this->_keywords->getKeywords($this->_category)['keywords'] as $keyword) {
                    // if (isset($tweets->retweeted_status->full_text) && $this->analyseEachInfluencerTweet($tweets->retweeted_status->full_text, $keyword) && $this->matchesInfluencerLocation($tweets->user->location)) {
                    if (isset($tweets->retweeted_status->full_text) && $this->analyseEachInfluencerTweet($tweets->retweeted_status->full_text, $keyword)) {
                        $counter++;
                    // } else if (!isset($tweets->retweeted_status->full_text) && $this->analyseEachInfluencerTweet($tweets->full_text, $keyword) && $this->matchesInfluencerLocation($tweets->user->location)) {
                    } else if (!isset($tweets->retweeted_status->full_text) && $this->analyseEachInfluencerTweet($tweets->full_text, $keyword)) {
                        $counter++;
                    }
                    
                    $profile_data[] = $tweets->user;
                }
            }
        }

        $engagement_data = [
            "followers" => $followers_count ?? 0,
            "retweets" => $retweets_count,
            "likes" => $likes_count,
        ];

        $engagement_rate = $this->calculateEngagementRate($engagement_data);

        // echo $counter / 2 . '%' . '<br>';

        if ($this->areTweetsRelevant($counter)) {
            $this->setInfluencerEngagementRate($engagement_rate);
            $this->setInfluencerFollowers($followers_count);

            $data = [
                "handle" => $screen_name,
                "followers" => $this->_followers,
                "engagement_rate" => $this->_engagement_rate,
                "profile_data" => $profile_data,
                "location" => $this->_location,
                "platform_id" => $this->_platform_id,
                "category_id" => $this->_keywords->getKeywords($this->_category)['category_id'], // adjusted for movies
            ];
            $this->handleExists($data);
        }
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
            return false;
        }
        $this->saveData($data);
    }

    function saveData($data)
    {
        $accounts = new Influencers;
        $accounts->handle = $data['handle'];
        $accounts->platform_id = $data['platform_id'];
        $accounts->category_id = $data['category_id'];
        $accounts->location = $data['location'];
        $accounts->engagement_rate = $data['engagement_rate'];
        $accounts->followers = $data['followers'];

        try {
            $accounts->save();
            return response()->json([
                'message' => "data saved successfully",
                "status" => "success"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
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
