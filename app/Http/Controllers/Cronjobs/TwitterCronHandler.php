<?php

namespace App\Http\Controllers\Cronjobs;

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
    private $_next_token;

    private $_platform_id = 1;

    private $_category;

    private $URLs = [
        'standard' => 'search/tweets',
        'premium-30' => 'tweets/search/30day/dev',
        'get-tweets' => 'statuses/user_timeline'
    ];

    private $_Parameters = [
        "get-influencer-tweets" => [
            "include_rts" => true,
            "exclude_replies" => true,
            "count" => 200
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
    }

    function index()
    {
        //----------------------Future Implementgation-----------------------------------
        // while($this->_next_token !== null){
        //     // Execute code
        //     // Update next token to null at the end of pagination
        // }
        //---------------------------------------------------------

        $keywords = new Keywords();
        foreach ($keywords->getKeywords($this->_category)['keywords'] as $keyword) {
            $standard_search_parameters = [
                "q" => $keyword,
                "lang" => "en",
                "count" => 100, // adjusted
                "geocode" => "6.5244,3.3792,9999999km",
                "result_type" => "mixed",
            ];

            try {
                // $tweets = $this->_connection->get($this->URLs['standard'], $standard_search_parameters);
                $tweets = $this->twitterFetch($this->URLs['standard'], $standard_search_parameters);
            } catch (\Exception $e) {
                return $e->getMessage();
            }

            foreach ($tweets->statuses as $status) {
                if (!$this->checkFollowers($status->user->followers_count)) {
                    $this->checkTweets($status->user->screen_name);
                }
            }
        }
    }

    function checkFollowers($followersCount)
    {
        if ($followersCount < 5000) { //adjusted
            return false;
        }
        return true;
    }


    function checkTweets($screen_name)
    {
        $keywords = new Keywords();
        $this->_Parameters["get-influencer-tweets"]["screen_name"] = $screen_name;

        try {
            // $influencerTweets = $this->_connection->get($this->URLs['get-tweets'], $this->_Parameters["get-influencer-tweets"]);
            $influencerTweets = $this->twitterFetch($this->URLs['get-tweets'], $this->_Parameters["get-influencer-tweets"]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        $counter = 0;

        foreach ($influencerTweets as $tweets) {
            if ($this->analyseEachInfluencerTweet($tweets->text)) {
                $counter++;
            }
        }
        echo $counter / 2 . '%' . '<br>'; //adjusted, added counter/2

        if ($this->areTweetsRelevant($counter)) {
            $data = [
                "handle" => $screen_name,
                "platform_id" => $this->_platform_id,
                "category_id" => $keywords->getKeywords($this->_category)['category_id'], // adjusted for movies
            ];
            $this->handleExists($data);
        }
    }

    function analyseEachInfluencerTweet($tweets)
    {
        $keywords = new Keywords();

        foreach ($keywords->getKeywords($this->_category)['keywords'] as $keyword) {
            if (stripos($tweets, $keyword) !== false) {
                return true;
            }
            return false;
        }
    }

    function areTweetsRelevant($counter)
    {
        if ($counter > 0) { // adjusted use 60 instead of 1
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
