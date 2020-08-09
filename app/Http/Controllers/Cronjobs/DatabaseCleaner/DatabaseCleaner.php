<?php

namespace App\Http\Controllers\Cronjobs\DatabaseCleaner;

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
    private $_location;
    private $_engagement_rate;

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
            $this->checkTweets($account->twitter_id);
        }

        return 'done';
    }

    function checkTweets($user_id)
    {
        $this->_Parameters["get-influencer-tweets"]["user_id"] = $user_id;

        try {
            $influencerTweets = $this->twitterFetch($this->URLs['get-tweets'], $this->_Parameters["get-influencer-tweets"]);
        } catch (\Exception $e) {
            dd($user_id, $e->getMessage());
        }

        // return json_encode($influencerTweets);

        $retweets_count = 0;
        $likes_count = 0;
        $followers_count = 0;
        $profile_data = '';
        $twitter_id = '';
        $screen_name = '';
        $error = false;

        if (is_array($influencerTweets) > 0) {
            foreach ($influencerTweets as $tweets) {
                $screen_name = $tweets->user->screen_name;
                $retweets_count += $tweets->retweet_count ?? 0;
                $likes_count += $tweets->favorite_count ?? 0;
                $followers_count = $tweets->user->followers_count;
                $influencer_location = $this->getInfluencerLocation($tweets->user->location);
                $this->setInfluencerLocation($influencer_location);

                $twitter_id = $tweets->user->id;
                $profile_data = $tweets->user;
            }
        } else {
            $error = true;
        }

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
        ];

        $this->updateData($influencer_data, $error);
    }

    function updateData($data, $error = false)
    {
        if ($error) {
            return;
        }

        $accounts = new Influencers;

        $twitter_id = $data['twitter_id'];
        $twitter_id = strval($twitter_id);

        try {
            $accounts->where('twitter_id', $twitter_id)->update([
                'handle' => $data['handle'],
                'profile_data' => json_encode($data['profile_data']),
                'followers' => $data['followers'],
                'engagement_rate' => $data['engagement_rate'],
                'engagement_rate_value' => $data['engagement_rate_value'],
                'location' => $data['location'],
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    function calculateEngagementRate($engagement_data)
    {
        $reach = $engagement_data["followers"] * 0.3;
        $impressions = round($reach * $engagement_data["no_of_tweets"], 1);
        $total_engagements = 0;

        if ($impressions != 0 || $impressions != 0.0) {
            $total_engagements = (($engagement_data["likes"] + $engagement_data["retweets"] + $engagement_data["quotes"]) / $impressions) * 1000;
        }

        $engagementRate = round($total_engagements, 1);
        return $engagementRate;
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
