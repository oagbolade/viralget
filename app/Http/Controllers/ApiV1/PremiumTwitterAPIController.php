<?php

namespace App\Http\Controllers\ApiV1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Arr;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

use App\User;
use App\Subscription;
use App\ReportingHistory;
use App\ProfilingHistory;

class PremiumTwitterAPIController extends Controller
{
    //
    private $connection;

    private $_connection;

    private $_temporary_parameters;

    function __construct()
    {
        $this->_connection = new TwitterOAuth(
            env('TWITTER_CONSUMER_KEY'),
            env('TWITTER_CONSUMER_SECRET'),
            env('TWITTER_ACCESS_TOKEN'),
            env('TWITTER_TOKEN_SECRET')
        );

        $this->_connection->setTimeouts(9999, 9999);
    }

    function getAllProfileData($handle, $user)
    {
        $userTweets = $this->getUserTweets($handle, $user);
        return $userTweets;
    }

    function getProfileHighestRetweets($tweets)
    {

        usort($tweets, function ($a, $b) {
            return $a['retweet_count'] <=> $b['retweet_count'];
        });

        $topRetweets = array_slice(array_reverse($tweets), 0, 6);

        return $topRetweets;
    }

    function getEngagementData($profile, $tweets)
    {

        $total_tweets = count($tweets);

        $likes = 0;
        $retweets = 0;
        $quotes = 0;
        $replies = 0;
        $er = 0;


        if (!$total_tweets) {
            return;
        }

        foreach ($tweets as $tweet) {
            //           if(isset($tweet['retweeted_status'])) continue;
            $retweets += $tweet['retweet_count'];
            $likes += $tweet['favorite_count'];
            $quotes += isset($tweet['quote_count']) ? $tweet['quote_count'] : 0;
            $replies += isset($tweet['reply_count']) ? $tweet['reply_count'] : 0;
        }



        $obj = new \stdClass;


        $obj->avrLikes = ceil($likes / $total_tweets);
        $obj->avrRetweets = ceil($retweets / $total_tweets);


        $er = round((float) (($likes + $retweets + $replies + $quotes) / ($profile->followers_count)), 3);
        $obj->er = $er;

        return $obj;
    }


    function getUserProfile($value, $search_by = 'screen_name')
    {
        $profile = $this->guzzleClient('users/show', [$search_by => $value]);

        if (isset($profile->errors)) {
            return;
        }

        return $profile;
    }


    function getUserTweets($handle, $user)
    {
        $user_subscription = $user->subscription->plan;

        $count = $user_subscription->tweets;

        $is_searching = true;
        $days = date("U", strtotime('-' . $user_subscription->days . ' days'));
        $tweets_30_days = [];

        $initialQuery = [
            'screen_name' => $handle,
            'count' => 200,
            'include_rts' => false,
            'exclude_replies' => true,
        ];

        $max_id = 0;

        while ($is_searching) {
            try {
                $influencerTweets = $this->_connection->get('statuses/user_timeline', $initialQuery);
            } catch (\Exception $e) {
                return $e->getMessage();
            }

            if (isset($influencerTweets->errors)) {
                return;
            }

            if (count($influencerTweets) > 0) {
                $get_last_item = count($influencerTweets) - 1;
                $max_id = $influencerTweets[$get_last_item]->id;

                foreach ($influencerTweets as $tweets) {
                    // Get by 30  days
                    if ($this->getTwitterTimeStamp($tweets->created_at) >= $days) {
                        $tweets_30_days[] = $tweets;
                    }
                }
            }

            if (count($tweets_30_days) >= $count || count($influencerTweets) === 0) {
                $is_searching = false;
            }

            $initialQuery["max_id"] = $max_id - 1;
        }
        return $tweets_30_days;
    }

    function getTwitterTimeStamp($twitter_time)
    {
        $date = date_create($twitter_time);
        $timestamp = date_format($date, "U");
        return $timestamp;
    }

    function getHashtagTweets($package, $query, $location)
    {
        $days = date("YmdHi", strtotime('-' . $package->days . ' days'));
        $now = date("YmdH00");

        $fromDate = $days;
        $toDate = $now;

        if (request()->fromDate !== null && request()->toDate !== null && $package->tweets !== 'starter' && $package->tweets !== 'basic') {
            $fromDate = request()->fromDate;
            $toDate = request()->toDate;
        }

        $page = 0;
        $next = "";
        $searching = true;
        $tweets_array = [];

        $count = 500;
        $count = 100;

        switch ($package->name) {
            case 'enterprise':
                $max_page = 9;
                break;
            case 'premiumBusiness':
                $max_page = 6;
                break;
            case 'premiumLite':
                $max_page = 4;
                break;
            case 'basic':
                $max_page = 1;
                break;
            default:
                $max_page = 0;
                break;
        }

        $location_mapper = [
            'Nigeria' =>[
                'name' => 'Nigeria',
                'code' => 'NG',
            ],
            'Ghana' =>[
                'name' => 'Ghana',
                'code' => 'GH',
            ],
            'Kenya' =>[
                'name' => 'Kenya',
                'code' => 'KE',
            ],
            'South Africa' =>[
                'name' => 'South Africa',
                'code' => 'ZA',
            ],
        ];

        while ($searching) {
            if ($location != 'null' && $location != null) {
                if ($page === 0) {
                    $this->_temporary_parameters = [
                        "query" => "lang: en place: " 
                        . $location_mapper[$location]['name'] 
                        . " place_country: " 
                        . $location_mapper[$location]['code'] 
                        . " " . $query,
                        "maxResults" => $count,
                        'fromDate' => $fromDate,
                        'toDate' => $toDate,
                    ];
                } else {
                    $this->_temporary_parameters = [
                        "query" => "lang: en place: "
                        . $location_mapper[$location]['name']
                            . " place_country: "
                            . $location_mapper[$location]['code']
                            . " " . $query,
                        "maxResults" => $count,
                        'fromDate' => $fromDate,
                        'toDate' => $toDate,
                        "next" => $next,
                    ];
                }
            }

            if ($location == 'null'|| $location == null) {
                if ($page === 0) {
                    $this->_temporary_parameters = [
                        "query" => $query,
                        "maxResults" => $count,
                        'fromDate' => $fromDate,
                        'toDate' => $toDate,
                    ];
                } else {
                    $this->_temporary_parameters = [
                        "query" => $query,
                        "maxResults" => $count,
                        'fromDate' => $fromDate,
                        'toDate' => $toDate,
                        "next" => $next
                    ];
                }
            }

            try {
                $tweets_result = $this->_connection->get("tweets/search/" . env('TWITTER_API_TYPE') . "/" . env('TWITTER__APP_DEVELOPMENT_NAME'), $this->_temporary_parameters);
                $page++;
            } catch (\Exception $e) {
                // return error response
                return $e->getMessage();
            }
            
            if (isset($tweets_result->error)) {
                dd($tweets_result);
            }

            if (isset($tweets_result->results)) {
                foreach ($tweets_result->results as $status) {
                    $tweets_array[] = $status;
                }
            }

            if ($page === $max_page) {
                $searching = false;
                return $tweets_array;
            }

            if (isset($tweets_result->next)) {
                $next = $tweets_result->next;
            } else {
                $searching = false;
                return $tweets_array;
            }
        }
        return $tweets_array;
    }

    function getHashtagTweetsData($tweets, $user, $type = '', $top = false)
    {
        $_tweets = [];
        $total_tweets = count($tweets);
        $total_count = 0;

        if ($total_tweets > 0) {
            foreach ($tweets as $tweet) {
                switch ($type) {
                    case 'retweets': //retweeted tweets
                        if (isset($tweet->retweeted_status)) {
                            $_tweets[] = $tweet;
                            $total_count += 1;
                        }
                        break;
                    case 'original': //original tweets
                        if (!isset($tweet->retweeted_status)) {
                            $_tweets[] = $tweet;
                            $total_count += 1;
                        }
                        break;
                    case 'unique': //Unique tweets
                        if (is_null($tweet->in_reply_to_user_id_str)) {
                            $_tweets[] = $tweet;
                            $total_count += 1;
                        }
                        break;
                    case 'replies': //retweeted tweets
                        if (isset($tweet->in_reply_to_screen_name)) {
                            $_tweets[] = $tweet;
                            $total_count += 1;
                        }
                        break;

                    default: //Most active of the tweets
                        $_tweets[] = $tweet;
                        $total_count += 1;
                        break;
                }
            }
        }

        if ($top) {
            $data = $this->getTopHashTagData($_tweets, $user);
        } else {
            $data = $_tweets;
        }


        return ['count' => $total_count, 'data' => $data, 'percentage' => ceil(($total_count / $total_tweets) * 100)];
    }

    function getUserTimelineTweets($handle)
    {
        $tweets = $this->guzzleClient('statuses/user_timeline', ['screen_name' => $handle, 'count' => 500, 'include_rts' => false]);
        if (isset($tweets->error)) {
            return;
        }

        return $tweets;
    }

    function getUniqueContributors($tweets)
    {
        $accounts = [];
        $data = [];

        foreach ($tweets as $tweet) {
            $accounts[] = $tweet->user->screen_name; //get all usernames to sort occurence count
        }
        $data['unique_users'] = count(array_unique($accounts));
        $data['avr_contribution'] = round(count($tweets) / count(array_unique($accounts)), 2);
        return $data;
    }

    function getHashtagReach($tweets, $contribution)
    {
        $accounts = [];
        $profiles = [];

        foreach ($tweets as $tweet) {
            $accounts[] = $tweet->user->screen_name; //get all usernames to sort occurence count
            $profiles[$tweet->user->screen_name] = $tweet->user;
        }

        $users = array_unique($accounts);
        $total_followers = 0;
        $total_following = 0;

        foreach ($users as $user) {
            $total_followers += $profiles[$user]->followers_count;
        }

        return ['impact' => round($total_followers * $contribution['avr_contribution']), 'reach' => $total_followers];
    }

    function getTopHashTagData($tweets, $user)
    {

        $accounts = [];
        $profiles = [];
        $sorted = [];

        foreach ($tweets as $tweet) {
            $accounts[] = $tweet->user->screen_name; //get all usernames to sort occurence count
            $profiles[$tweet->user->screen_name] = $tweet->user; //Save the profiles of all accounts pending next use
        }
        $new_array = array_reverse(Arr::sort(array_count_values($accounts))); //Sort all according to counts

        $count = 1;
        $account_limit = 10;
        if ($user->subscription->plan->name == 'Enterprise') {
            $account_limit = 15;
        }
        //Return all data with the details user profiles and account name
        foreach ($new_array as $key => $value) {
            $sorted[] = [
                'user' => $profiles[$key],
                'count' => $value
            ];
            if ($count == $account_limit) break;
            $count++;
        }

        return $sorted;
    }

    function getHashtagPopularUsers($tweets, $user)
    {

        $followers = [];
        //        $profiles = [];
        $sorted = [];

        foreach ($tweets as $tweet) {
            $accounts[] = $tweet->user->followers_count; //get all usernames to sort occurence count
        }

        asort($accounts); //sort according to values
        $_followers = [];
        $listed = [];
        foreach ($accounts as $key => $value) {
            $listed[$value] = $key;
            $_followers[] = $value;
        }

        $reversed = array_unique(array_reverse($accounts));

        $count = 1;
        $account_limit = 10;
        if ($user->subscription->plan->name == 'Enterprise') {
            $account_limit = 15;
        }

        foreach ($reversed as $value) {
            $sorted[] = [
                'user' => $tweets[$listed[$value]]->user,
                'count' => $value
            ];
            if ($count == $account_limit) break;
            $count++;
        }

        return $sorted;
    }


    function getHashtagHighImpactUsers($tweets, $user)
    {

        $followers = [];
        $sorted = [];

        foreach ($tweets as $tweet) {
            $accounts[] = $tweet->user->followers_count + $tweet->user->friends_count; //get all followers to sort occurence count
        }

        asort($accounts); //sort according to values
        $_followers = [];
        $listed = [];
        foreach ($accounts as $key => $value) {
            $listed[$value] = $key;
            $_followers[] = $value;
        }

        $reversed = array_reverse(array_unique($_followers));

        $count = 1;
        $account_limit = 10;
        if ($user->subscription->plan->name == 'Enterprise') {
            $account_limit = 15;
        }
        foreach ($reversed as $value) {
            $sorted[] = [
                'user' => $tweets[$listed[$value]]->user,
                'count' => $value
            ];
            if ($count == $account_limit) break;
            $count++;
        }

        return $sorted;
    }


    // function getTweets() {
    //     $query = request()->q;

    //     $this->connect();

    //     if(!$query) {
    //         return response(['status' => 'error', 'message' => 'Please specify the hashtag/query'], 401);
    //     }

    //     $tweets = $this->connection->get("search/tweets", ['q' => $query, 'result_type'=>'mixed', 'count' => '100']);

    //     return response(['status' => 'ok', 'data' => $tweets], 200);
    // }



    function getTweetsMedia($tweets, $type = 'profile')
    {

        $media_tweets = [];
        $total_tweets = count($tweets);


        if ($total_tweets > 0) {
            foreach ($tweets as $tweet) {
                if ($type == 'hashtag') {
                    if (isset($tweet->extended_tweet->entities->media)) {
                        $media_tweets[] = $tweet;
                    }
                } else {
                    if (isset($tweet->entities->media)) {
                        $media_tweets[] = $tweet;
                    }
                }
            }
        }

        $total_media_tweets = count($media_tweets);


        $text_tweets = $total_tweets - $total_media_tweets;

        $text_tweets_percentage = ceil(($text_tweets / $total_tweets) * 100);
        $media_tweets_percentage = ceil(($total_media_tweets / $total_tweets) * 100);

        return [
            'text' => ['count' => $text_tweets, 'percentage' => $text_tweets_percentage],
            'media' => ['count' => count($media_tweets), 'percentage' => $media_tweets_percentage]
        ];
    }


    function getTopRetweeters($tweeters)
    {
        $sorted = [];

        if (count($tweeters) > 0) {
            $new_array = Arr::sort(array_count_values($tweeters));
            while (list($key, $val) = each($new_array)) {
                $sorted[] = ['user' => $key, 'count' => $val];
            }
        }

        return array_splice($sorted, count($sorted) - 5, 5);
    }


    function retweetersList($tweets)
    {

        $retweeters = [];

        if (count($tweets) > 0) {
            $count = 1;
            foreach ($tweets as $tweet) {
                $retweeters_list = $this->fetchRetweeters($tweet->id);
                if (!is_null($retweeters_list)) {
                    foreach ($retweeters_list as $retweeter) {
                        $retweeters[] = $retweeter;
                    }
                }
                if ($count == 10) break;

                $count++;
            }
        }

        return $retweeters;
    }

    function fetchRetweeters($id)
    {
        $this->connect();

        $accounts = $this->connection->get("statuses/retweeters/ids", ['id' => $id, 'stringify_ids' => true]);

        if (isset($accounts->errors) || count($accounts->ids) == 0) {
            return;
        }

        return $accounts->ids;
    }

    function sortResult($arr)
    {
        $a = [];
        $b = [];
        $prev = '';

        $arr = Arr::sort($arr);

        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] !== $prev) {
                $a[] = $arr[$i];
                $b[] = 1;
            } else {
                $b[count($b) - 1]++;
            }
            $prev = $arr[$i];
        }

        return [$a, $b];
    }


    function guzzleClient($path, $data, bool $recursive = false)
    {
        $stack = HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key'    => env('TWITTER_CONSUMER_KEY'),
            'consumer_secret' => env('TWITTER_CONSUMER_SECRET'),
            'token'           => $token ?? env('TWITTER_ACCESS_TOKEN'),
            'token_secret'    => $secret ?? env('TWITTER_ACCESS_TOKEN_SECRET')
        ]);
        $stack->push($middleware);

        $client = new Client([
            'base_uri' => 'https://api.twitter.com/1.1/',
            'handler' => $stack,
            'auth' => 'oauth'
        ]);


        try {
            $res = $client->get($path . '.json', ['query' => $data]);
        } catch (\Exception $e) {
            $response = new \stdClass;
            $response->error = $e->getMessage();
            return $response;
        }

        $response = json_decode($res->getBody());

        return $response;

        // try {
        //     $stack = HandlerStack::create();

        //     $middleware = new Oauth1([
        //         'consumer_key'    => env('TWITTER_CONSUMER_KEY'),
        //         'consumer_secret' => env('TWITTER_CONSUMER_SECRET'),
        //         'token'           => env('TWITTER_ACCESS_TOKEN'),
        //         'token_secret'    => env('TWITTER_ACCESS_TOKEN_SECRET')
        //     ]);
        //     $stack->push($middleware);

        //     $client = new Client([
        //         'base_uri' => 'https://api.twitter.com/1.1/',
        //         'handler' => $stack,
        //         'auth' => 'oauth'
        //     ]);

        //     $res = $client->get($path.'.json', ['query' => $data]);

        //     $response = json_decode($res->getBody());

        //     return $response;

        // } catch(\Exception $e) {

        //     http_response_code($e->getCode());
        //     header('Content-Type: application/json');
        //     echo json_encode(['error' => $e->getMessage(), 'status' => false]);
        //     die();
        // }

    }
}
