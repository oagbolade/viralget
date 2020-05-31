<?php

namespace App\Http\Controllers\Cronjobs;

ini_set("memory_limit", -1);

set_time_limit(0);

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Http\Controllers\Cronjobs\keywords;
use App\Account;
use Exception;

use function GuzzleHttp\json_encode;

class TwitterCronHandler extends Controller
{
    private $_next_token = null;

    private $_keywords;

    private $prepared_keywords = "";

    private $_platform_id = 1;

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

    function getInfluencerLocation($location){
        $state = explode(",", $location);
        return $state[0];
    }

    function index() //Rename to search
    {
        // $this->_temporary_parameters = [
        //     "query" => "place_country: NG (tech OR coding OR software OR developer) -discount -promo -cash -sale -game -bet",
        //     "maxResults" => 10,
        // ];

        // try {
        //     $tweets = $this->twitterFetch($this->URLs['premium-30-sandbox'], $this->_temporary_parameters);
        // } catch (\Exception $e) {
        //     return $e->getMessage();
        // }
        // return json_encode($tweets);

        // return;
        //////////////////////////////////////////////////////////////
        // $this->_Parameters["get-influencer-tweets"]["screen_name"] = "unicodeveloper";

        // try {
        //     $influencerTweets = $this->twitterFetch($this->URLs['get-tweets'], $this->_Parameters["get-influencer-tweets"]);
        // } catch (\Exception $e) {
        //     return $e->getMessage();
        // }
        // return json_encode($influencerTweets);

        // return;
        ///////////////////////////////////////////////////////
        // $page = 0;
        // $next = "";
        // $searching = true;

        // while ($searching) {
        //     if($page === 0){
        //         $this->_temporary_parameters = [
        //             "query" => "place_country: NG place: lagos (tech OR coding OR software OR developer) -discount -promo -cash -sale -game -bet",
        //             "maxResults" => 100,
        //         ];
        //     }else{
        //         $this->_temporary_parameters = [
        //             "query" => "place_country: NG place: lagos (tech OR coding OR software OR developer) -discount -promo -cash -sale -game -bet",
        //             "maxResults" => 100,
        //             "next" => $next
        //         ];
        //     }

        //     $page++;

        //     try {
        //         $tweets = $this->twitterFetch($this->URLs['premium-30-sandbox'], $this->_temporary_parameters);
        //     } catch (\Exception $e) {
        //         return $e->getMessage();
        //     }

        //     if(isset($tweets->results)){
        //         foreach ($tweets->results as $status) {
        //             if ($this->checkFollowers($status->user->followers_count)) {
        //                 $this->checkTweets($status->user->screen_name);
        //             }
        //         }
        //     }

        //     // For live data
        //     if(isset($tweets->next)){
        //         $next = $tweets->next;
        //     }else{
        //         $searching = false;
        //         return json_encode($tweets);
        //     }

        //     // For testing
        //     if($page === 5){
        //         return json_encode($tweets);
        //     }

        // }

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

            $standard_search_parameters = [
                "query" => $this->prepare_keywords($sliced_array),
                "maxResults" => 100,
            ];

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
                $tweets = $this->twitterFetch($this->URLs['premium-30-sandbox'], $standard_search_parameters);
            } catch (\Exception $e) {
                return $e->getMessage();
            }

            $page++;

            // return json_encode($tweets);

            if (isset($tweets->results)) {
                foreach ($tweets->results as $status) {
                    if ($this->checkFollowers($status->user->followers_count)) {
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

            if ($page === 5) {
                $is_searching = false;
                return json_encode($tweets);
            }

            //Stop searching for keywords
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

    function engagementRate($allTweets, $likes, $retweets, $followersCount)
    {
        $engagementRatePerPost = $likes + ($retweets * 2) / $followersCount;
        $engagementRate = $engagementRatePerPost / 200;
        return $engagementRate;
    }

    function checkFollowers($followersCount)
    {
        if ($followersCount < 5000) {
            return false;
        }
        return true;
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

        foreach ($influencerTweets as $tweets) {
            foreach ($this->_keywords->getKeywords($this->_category)['keywords'] as $keyword) {
                if (isset($tweets->retweeted_status->full_text) && $this->analyseEachInfluencerTweet($tweets->retweeted_status->full_text, $keyword)) {
                    $counter++;
                } else if (!isset($tweets->retweeted_status->full_text) && $this->analyseEachInfluencerTweet($tweets->full_text, $keyword)) {
                    $counter++;
                }
            }
        }

        // echo $counter / 2 . '%' . '<br>';

        if ($this->areTweetsRelevant($counter)) {
            $data = [
                "handle" => $screen_name,
                // "platform_id" => $this->_platform_id,
                "platform_id" => "testing",
                "category_id" => $this->_keywords->getKeywords($this->_category)['category_id'], // adjusted for movies
            ];
            $this->handleExists($data);
        }
    }

    function analyseEachInfluencerTweet($tweets, $keywords)
    {
        if (stripos($tweets, $keywords) !== false) {
            return true;
        }
    }

    function areTweetsRelevant($counter)
    {
        if ($counter > 60) {
            return true;
        }
    }

    function handleExists($data = [])
    {
        $user = Account::where('handle', '=', $data['handle'])->first();
        if ($user) {
            return false;
        }
        $this->saveData($data);
    }

    function saveData($data)
    {
        $accounts = new Account;
        $accounts->handle = $data['handle'];
        $accounts->platform_id = $data['platform_id'];
        $accounts->category_id = $data['category_id'];

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
