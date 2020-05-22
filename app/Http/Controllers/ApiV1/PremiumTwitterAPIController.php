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


    function getAllProfileData($handle, $user) {


        $userTweets = $this->getUserTweets($handle, $user);
        $tweetsData = json_decode(json_encode($userTweets));
        $tweets = $tweetsData->results;
        //If data not found by default via premium, use basic data
        if(!$tweets) {
            $tweets = json_decode(json_encode($this->getUserTimelineTweets($handle)));
        }

        return $tweets;
    }

    function getProfileHighestRetweets($tweets) {

        usort($tweets, function($a, $b) {
            return $a['retweet_count'] <=> $b['retweet_count'];
        });

       $topRetweets = array_slice(array_reverse($tweets), 0, 6);

       return $topRetweets;
    }

    function getEngagementData($profile, $tweets) {

        $total_tweets = count($tweets);

        $likes = 0;
        $retweets = 0;
        $quotes = 0;
        $replies = 0;
        $er = 0;


        if(!$total_tweets) {
            return;
        }

        foreach($tweets as $tweet) {
//           if(isset($tweet['retweeted_status'])) continue;
            $retweets += $tweet['retweet_count'];
            $likes += $tweet['favorite_count'];
            $quotes += isset($tweet['quote_count'])? $tweet['quote_count'] : 0;
            $replies += isset($tweet['reply_count'])? $tweet['reply_count'] : 0;
        }



        $obj = new \stdClass;


        $obj->avrLikes = ceil($likes / $total_tweets);
        $obj->avrRetweets = ceil($retweets / $total_tweets);


        $er = round((float)(($likes + $retweets + $replies + $quotes) / ($profile->followers_count)), 3);
        $obj->er = $er;

        return $obj;
    }


    function getUserProfile($value, $search_by = 'screen_name') {

//        $profile = $this->connection->get("users/show", [$search_by => $value]);
        $profile = $this->guzzleClient('users/show', [$search_by => $value]);

        if(isset($profile->errors)) {
            return;
        }


        return $profile;
    }


    function getUserTweets($handle, $user) {

        $count = ($user->subscription->plan->name == 'Premium') ? 250 : 500;

        $initialQuery = env('TWITTER_DEV_ENV') == 'sandbox' ? ['query' => "from:$handle"] : ['query' => "from:$handle -is:retweet -is:reply"];

        $queryData = env('TWITTER_DEV_ENV') == 'sandbox' ? $initialQuery : array_merge(['maxResults' => $count], $initialQuery);

        $tweets = $this->guzzleClient('tweets/search/'.env('TWITTER_API_TYPE').'/dev', $queryData);

//        $tweets = $this->guzzleClient('statuses/user_timeline', ['screen_name' => $handle, 'count' => 100,  'exclude_replies' => true, 'include_rts' => false]);

        // $tweets = $this->connection->get("statuses/user_timeline", ['screen_name' => $handle, 'count' => 100, 'exclude_replies'=> true]);
        if(isset($tweets->errors)) {
            return;
        }

        return $tweets;
    }

    function getHashtagTweets($package, $query, $to = '', $request) {


        $count = ($package->name == 'Premium') ? 250 : 500;

        $initialQuery = ['query' => $query, 'fromDate' => $request->fromDate, 'toDate' => $request->toDate];

        $queryData = env('TWITTER_DEV_ENV') == 'sandbox' ? $initialQuery : array_merge(['maxResults' => $count], $initialQuery);

            // $tweets_result = $this->guzzleClient('tweets/search/30day/dev', ['maxResults' => $count, 'query' => "$query -is:retweet -is:reply"]);

        $type = 'fullarchive'; //30day
        $tweets_result = $this->guzzleClient("tweets/search/".env('TWITTER_API_TYPE')."/dev", $queryData); //specify from time and to here later


       if(!$tweets_result || isset($tweets_result->errors)) {
            return response(['status' => 'error', 'message' => 'Error fetching data'], 403);
        } else {

            $tweets = $tweets_result->results;
            $next = isset($tweets_result->next) ? $tweets_result->next : '';
            $loop_count = 0;

                // while($next != '' && $loop_count <= 1) {
                if($next) {
                    $tweets_result = $this->guzzleClient("tweets/search/".env('TWITTER_API_TYPE')."/dev", array_merge($queryData, ['next' => $tweets_result->next]));
                    $tweets = array_merge($tweets, $tweets_result->results);
                }
                //     if(isset($tweets_result->next)) {
                //         $next = $tweets_result->next;
                //     } else {
                //         $next = '';
                //     }

                //     $loop_count++;
                // }

            return $tweets;
        }
//       return $tweets_result;


//         if(!$tweets_result || isset($tweets_result->errors)) {
//             return response(['status' => 'error', 'message' => 'Error fetching data'], 403);
//         }


//         $data = [];

// //        $data['count'] = $tweets_count->totalCount;
//         $tweets = $tweets_result->results;

//         return $tweets;

//         $data['count'] = count($tweets);

//         $contribution = $this->getUniqueContributors($tweets);
//         $reach = $this->getHashtagReach($tweets, $contribution);

//         $data['retweets'] =  $this->getHashtagTweetsData($tweets, $user, 'retweets');
//         $data['replies'] =  $this->getHashtagTweetsData($tweets, $user, 'replies');;

//         $data['most_active'] = $this->getHashtagTweetsData($tweets, $user, '', true);
//         $data['popular'] = $this->getHashtagPopularUsers($tweets, $user);
//         $data['high_retweets'] =  $this->getHashtagTweetsData($tweets, $user, 'retweets', true);
//         $data['high_impacts'] = $this->getHashtagHighImpactUsers($tweets, $user);
//         $data['contributors'] = $contribution['unique_users'];
//         $data['avr_contribution'] = $contribution['avr_contribution'];
//         $data['potential_reach'] = $reach['reach'];
//         $data['potential_impact'] = $reach['impact'];
//         $data['media_meta_data'] = $this->getTweetsMedia($tweets, 'hashtag');
//         $data['report_type'] = $user->subscription->plan->days;


//         Subscription::where('user_id', $user->id)->decrement('reporting_balance', 1);

//         $report = ReportingHistory::create([
//                         'user_id' => $user->id,
//                         'query' => $query,
//                         'report_data' => json_encode($data)
//                     ]);

//         return response(['status' => 'success', 'data' => $data, 'id' => $report->id], 200);
    }


    function getHashtagTweetsData($tweets, $user, $type = '', $top = false) {
        $_tweets = [];
        $total_tweets = count($tweets);
        $total_count = 0;

        if($total_tweets > 0) {
            foreach($tweets as $tweet) {
//                dd($tweet->entities->media);

                switch ($type) {
                    case 'retweets': //retweeted tweets
                        if(isset($tweet->retweeted_status)) {
                            $_tweets[] = $tweet;
                            $total_count += 1;
//                            $total_count += $tweet->retweeted_status->retweet_count;
                        }
                        break;
                    case 'original': //original tweets
                        if(!isset($tweet->retweeted_status)) {
                            $_tweets[] = $tweet;
                            $total_count += 1;
                        }
                        break;
                    case 'unique': //Unique tweets
                        if(is_null($tweet->in_reply_to_user_id_str)) {
                            $_tweets[] = $tweet;
                            $total_count += 1;
                        }
                        break;
                    case 'replies': //retweeted tweets
                        if(isset($tweet->in_reply_to_screen_name)) {
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

        if($top) {
            $data = $this->getTopHashTagData($_tweets, $user);
        } else {
            $data = $_tweets;
        }


       return ['count' => $total_count, 'data' => $data, 'percentage' => ceil(($total_count / $total_tweets) * 100)];

    }

    function getUserTimelineTweets($handle) {
        $tweets = $this->guzzleClient('statuses/user_timeline', ['screen_name' => $handle, 'count' => 500, 'include_rts' => false]);
        if(isset($tweets->error)) {
            return;
        }

        return $tweets;
    }

    function getUniqueContributors($tweets) {
        $accounts = [];
        $data = [];

        foreach($tweets as $tweet) {
            $accounts[] = $tweet->user->screen_name; //get all usernames to sort occurence count
        }
        $data['unique_users'] = count(array_unique($accounts));
        $data['avr_contribution'] = round(count($tweets) / count(array_unique($accounts)),2);
        return $data;
    }

    function getHashtagReach($tweets, $contribution) {
        $accounts = [];
        $profiles = [];

        foreach($tweets as $tweet) {
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

    function getTopHashTagData($tweets, $user) {

        $accounts = [];
        $profiles = [];
        $sorted = [];

        foreach($tweets as $tweet) {
            $accounts[] = $tweet->user->screen_name; //get all usernames to sort occurence count
            $profiles[$tweet->user->screen_name] = $tweet->user; //Save the profiles of all accounts pending next use
        }
        $new_array = array_reverse(Arr::sort(array_count_values($accounts))); //Sort all according to counts

        $count = 1;
        $account_limit = 10;
        if($user->subscription->plan->name == 'Enterprise') {
            $account_limit = 15;
        }
        //Return all data with the details user profiles and account name
        foreach($new_array as $key => $value) {
            $sorted[] = [
                    'user' => $profiles[$key],
                    'count' => $value
                ];
            if($count == $account_limit) break;
            $count++;
        }

        return $sorted;

    }

    function getHashtagPopularUsers($tweets, $user) {

        $followers = [];
//        $profiles = [];
        $sorted = [];

        foreach($tweets as $tweet) {
            $accounts[] = $tweet->user->followers_count; //get all usernames to sort occurence count
        }

        asort($accounts); //sort according to values
        $_followers = [];
        $listed = [];
        foreach($accounts as $key => $value)
        {
            $listed[$value] = $key;
            $_followers[] = $value;
        }

        $reversed = array_unique(array_reverse($accounts));

        $count = 1;
        $account_limit = 10;
        if($user->subscription->plan->name == 'Enterprise') {
            $account_limit = 15;
        }

        foreach($reversed as $value) {
            $sorted[] = [
                    'user' => $tweets[$listed[$value]]->user,
                    'count' => $value
                ];
                if($count == $account_limit) break;
                $count++;
        }

        return $sorted;
    }


    function getHashtagHighImpactUsers($tweets, $user) {

        $followers = [];
        $sorted = [];

        foreach($tweets as $tweet) {
            $accounts[] = $tweet->user->followers_count + $tweet->user->friends_count; //get all followers to sort occurence count
        }

        asort($accounts); //sort according to values
        $_followers = [];
        $listed = [];
        foreach($accounts as $key => $value)
        {
            $listed[$value] = $key;
            $_followers[] = $value;
        }

        $reversed = array_reverse(array_unique($_followers));

        $count = 1;
        $account_limit = 10;
        if($user->subscription->plan->name == 'Enterprise') {
            $account_limit = 15;
        }
        foreach($reversed as $value) {
            $sorted[] = [
                    'user' => $tweets[$listed[$value]]->user,
                    'count' => $value
                ];
                if($count == $account_limit) break;
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



    function getTweetsMedia($tweets, $type = 'profile') {

        $media_tweets = [];
        $total_tweets = count($tweets);


        if($total_tweets > 0) {
            foreach($tweets as $tweet) {
                if($type == 'hashtag') {
                    if(isset($tweet->extended_tweet->entities->media)) {
                        $media_tweets[] = $tweet;
                    }
                } else {
                    if(isset($tweet->entities->media)) {
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


    function getTopRetweeters($tweeters) {
        $sorted = [];

        if(count($tweeters) > 0) {
            $new_array = Arr::sort(array_count_values($tweeters));
                while (list ($key, $val) = each ($new_array)) {
                    $sorted[] = ['user' => $key, 'count' => $val];
                }
        }

        return array_splice($sorted, count($sorted) - 5, 5);
    }


    function retweetersList($tweets) {

        $retweeters = [];

        if(count($tweets) > 0 ) {
            $count = 1;
            foreach($tweets as $tweet) {
                $retweeters_list = $this->fetchRetweeters($tweet->id);
                if(!is_null($retweeters_list)) {
                    foreach($retweeters_list as $retweeter) {
                        $retweeters[] = $retweeter;
                    }
                }
                if($count == 10) break;

                $count++;
            }
        }

        return $retweeters;
    }

    function fetchRetweeters($id) {
        $this->connect();

        $accounts = $this->connection->get("statuses/retweeters/ids", ['id' => $id, 'stringify_ids' => true]);

        if(isset($accounts->errors) || count($accounts->ids) == 0) {
            return;
        }

        return $accounts->ids;

    }

    function sortResult($arr) {
        $a = [];
        $b = [];
        $prev = '';

        $arr = Arr::sort($arr);

        for ( $i = 0; $i < count($arr); $i++ ) {
            if ( $arr[$i] !== $prev ) {
                $a[] = $arr[$i];
                $b[] = 1;
            } else {
                $b[count($b) - 1]++;
            }
            $prev = $arr[$i];
        }

        return [$a, $b];
    }


    function guzzleClient($path, $data, bool $recursive = false) {

        try {
            $stack = HandlerStack::create();

            $middleware = new Oauth1([
                'consumer_key'    => env('TWITTER_CONSUMER_KEY'),
                'consumer_secret' => env('TWITTER_CONSUMER_SECRET'),
                'token'           => env('TWITTER_ACCESS_TOKEN'),
                'token_secret'    => env('TWITTER_ACCESS_TOKEN_SECRET')
            ]);
            $stack->push($middleware);

            $client = new Client([
                'base_uri' => 'https://api.twitter.com/1.1/',
                'handler' => $stack,
                'auth' => 'oauth'
            ]);

            $res = $client->get($path.'.json', ['query' => $data]);

            $response = json_decode($res->getBody());

            return $response;

        } catch(\Exception $e) {

            http_response_code($e->getCode());
            header('Content-Type: application/json');
            echo json_encode(['error' => $e->getMessage(), 'status' => false]);
            die();
        }

    }
}

