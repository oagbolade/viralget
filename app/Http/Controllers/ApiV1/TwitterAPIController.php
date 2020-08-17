<?php

namespace App\Http\Controllers\ApiV1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

use App\User;
use App\Subscription;
use App\Plans;
use App\ReportingHistory;
use App\ProfilingHistory;
use App\Account;

use App\Http\Controllers\ApiV1\PremiumTwitterAPIController;
use Exception;

class TwitterAPIController extends Controller
{
    //
    private $connection;

    function connect()
    {
        $this->connection = new TwitterOAuth(
            env('TWITTER_CONSUMER_KEY'),
            env('TWITTER_CONSUMER_SECRET'),
            env('TWITTER_ACCESS_TOKEN'),
            env('TWITTER_TOKEN_SECRET')
        );
    }

    function authenticate()
    {
        $auth_data = explode(' ', request()->header('Authorization'));
        $token = $auth_data[1];
        $user = User::where('api_token', $token)->first();

        return $user;
    }

    function getHashtagTweets(Request $request)
    {
        $user = $this->authenticate();
        if (!$user) return response(['status' => 'error', 'message' => 'Unauthorized user']);
        
        $location = request()->location;

        if (request()->has('plan')) {
            $package = Plans::where('name', request()->plan)->first();

            if (!$package) {
                return response(['status' => 'error', 'message' => 'Plan does not exist']);
            }

            switch ($user->subscription->plan->name) {
                case 'enterprise':
                    $proceed = (in_array($package->name, ['starter', 'basic', 'premiumLite', 'premiumBusiness', 'enterprise'])) ? true : false;
                    break;
                case 'premiumBusiness':
                    $proceed = (in_array($package->name, ['starter', 'basic', 'premiumLite', 'premiumBusiness'])) ? true : false;
                    break;
                case 'premiumLite':
                    $proceed = (in_array($package->name, ['starter', 'basic', 'premiumLite'])) ? true : false;
                    break;
                case 'basic':
                    $proceed = (in_array($package->name, ['starter', 'basic'])) ? true : false;
                    break;
                case 'starter':
                    $proceed = (in_array($package->name, ['starter'])) ? true : false;
                    break;
                default:
                    $proceed = false;
                    break;
            }

            if (!$proceed) {
                return response(['status' => 'error', 'message' => 'Sorry, you do not have access to the specified plan']);
            }
        } else {
            $package = $user->subscription->plan;
        }

        $decode_query = urldecode(request()->q);
        $query = $decode_query;

        if (!$query) {
            return response(['status' => 'error', 'message' => 'Please specify a user handle to query'], 403);
        }

        $report = ReportingHistory::where(['user_id' => $user->id, 'query' => $query])->first();

        if ($report && $report->report_data !== null) {
            $data['report_type'] = $report->plan->name;
            $data['report_type_days'] = $report->plan->days;
            $data['data'] = json_decode(json_encode($report->report_data));

            $contributors['original_contributors'] = json_decode(json_encode($report->original_contributors));
            $contributors['top_original_contributors'] = json_decode(json_encode($report->top_original_contributors));

            $high_tweets['most_recent_tweets'] = json_decode(json_encode($report->most_recent_tweets));
            $high_tweets['most_recent_replies'] = json_decode(json_encode($report->most_recent_replies));
            $high_tweets['highest_retweeted_tweets'] = json_decode(json_encode($report->highest_retweeted_tweets));

            $data['handle'] = $report->query;

            return response([
                'status' => 'success',
                'data' => $data,
                'id' => $report->id,
                'high_tweets' => $high_tweets,
                'contributors' => $contributors
            ], 200);
        }

        $no_of_tweets = 100;

        if ($package->name == 'basic' || $package->name == 'premiumBusiness' || $package->name == 'premiumLite' || $package->name == 'enterprise') {
            $premiumData = new PremiumTwitterAPIController;
            $tweets = $premiumData->getHashtagTweets($package, $query, $location);
        } else {
            $this->connect();

            $tweets_result = $this->connection->get("search/tweets", ['q' => $query, 'count' => $no_of_tweets]);

            if (!$tweets_result || isset($tweets_result->error)) {
                return response(['status' => 'error', 'message' => 'Error fetching data'], 403);
            } else {
                $tweets = $tweets_result->statuses;
            }
        }

        $data = [];

        if (count($tweets) > 0) {
            $data['count'] = count($tweets);
        } else {
            return response(['message' => 'cannot retrieve tweets'], 500);
        }

        $contribution = $this->getUniqueContributors($tweets);
        $reach = $this->getHashtagReach($tweets, $contribution);
        $data['date_from'] = request()->fromDate !== null ? \Carbon\Carbon::parse($request->fromDate)->toDayDateTimeString() : \Carbon\Carbon::now()->subDays($package->days)->toDayDateTimeString();
        $data['date_to'] = request()->toDate !== null ? \Carbon\Carbon::parse($request->toDate)->toDayDateTimeString() : \Carbon\Carbon::now()->toDayDateTimeString();
        $data['retweets'] =  $this->getHashtagTweetsData($tweets, $user, 'retweets', true);
        $data['replies'] =  $this->getHashtagTweetsData($tweets, $user, 'replies');
        $data['high_likes'] =  $this->getHashtagTweetsData($tweets, $user, 'likes', true);
        $data['most_active'] = $this->getHashtagTweetsData($tweets, $user, 'original', true);
        $data['popular'] = $this->getHashtagPopularUsers($tweets, $user);
        $data['high_retweets'] =  $this->getHashtagTweetsData($tweets, $user, 'retweets', true);

        // High tweets data
        $most_recent_tweets = $this->getMostRecentTweets($tweets);
        $most_recent_replies = $this->getMostRecentReplies($tweets);
        $highest_retweeted_tweets = $this->getProfileHighestRetweets($tweets, true);

        // Contributors Data
        $original_contributors = $this->getOriginalContributorsData($tweets, $user)['original_contributors'];
        $top_original_contributors = $this->getOriginalContributorsData($tweets, $user)['top_original_contributors'];

        $impressions = $this->getTopHashImpactsData($tweets, $user);
        $data['high_impacts'] = $impressions['sorted'];
        $data['contributors'] = $contribution['unique_users'];
        $data['avr_contribution'] = $contribution['avr_contribution'];

        $total_engagements = $this->getTotalEngagements($tweets);
        $data['potential_reach'] = $reach['reach'];
        $data['impressions'] = $impressions['sum'];
        $data['campaign_value'] = ($impressions['sum'] / 1000) * 80;
        $data['accurate_engagement_rate'] = ($total_engagements / $data['impressions']) * 100;
        $data['total_engagements'] = $total_engagements;

        $data['potential_impact'] =  $impressions['sum'] * 0.60; //$reach['impact'];
        $data['media_meta_data'] = $this->getTweetsMedia($tweets, 'hashtag');
        $data['report_type'] = $package->days;
        $data['report_type_name'] = $package->name;
        $data['engagement_rate'] = $this->getHashtagEngagementData($tweets, $reach['reach']);

        $report = ReportingHistory::where(['user_id' => $user->id, 'query' => $query])->first();

        if (!$report) {
            Subscription::where('user_id', $user->id)->decrement('reporting_balance', 1);
            $removeSymbol = str_replace('#', '', strip_tags(request()->q));

            try {
                $report = ReportingHistory::create([
                    'user_id' => $user->id,
                    'query' => $removeSymbol,
                    'report_data' => json_encode($data),
                    'original_contributors' => json_encode($original_contributors),
                    'top_original_contributors' => json_encode($top_original_contributors),
                    'most_recent_tweets' => json_encode($most_recent_tweets),
                    'most_recent_replies' => json_encode($most_recent_replies),
                    'highest_retweeted_tweets' => json_encode($highest_retweeted_tweets),
                    'package' => $package->id
                ]);
            } catch (Exception $e) {
                return response([
                    "status" => 500,
                    "message" => "failed to get report " . $e->getMessage(),
                ], 500);
            }
        } elseif ($report && $report->report_data === null) {
            Subscription::where('user_id', $user->id)->decrement('reporting_balance', 1);

            try {
                ReportingHistory::where(['user_id' => $user->id, 'query' => $query])->update([
                    'user_id' => $user->id,
                    'query' => $query,
                    'report_data' => json_encode($data),
                    'original_contributors' => json_encode($original_contributors),
                    'top_original_contributors' => json_encode($top_original_contributors),
                    'most_recent_tweets' => json_encode($most_recent_tweets),
                    'most_recent_replies' => json_encode($most_recent_replies),
                    'highest_retweeted_tweets' => json_encode($highest_retweeted_tweets),
                    'package' => $package->id
                ]);
            } catch (Exception $e) {
                return response([
                    "status" => 500,
                    "message" => "failed to get report " . $e->getMessage(),
                ], 500);
            }
        }

        return response(['status' => 'success', 'data' => $data, 'id' => $report->id], 200);
    }

    function getMostRecentTweets($tweets)
    {
        $recent_tweets = [];
        $temp_recent_tweets = [];

        foreach ($tweets as $tweet) {
            if (!array_key_exists($tweet->user->screen_name, $recent_tweets) && (!isset($tweet->retweeted_status)) && $tweet->in_reply_to_screen_name === null) {
                $temp_recent_tweets[$tweet->user->screen_name] = ["tweet_data" => $tweet];
            }
        }

        $sliced_array = array_slice($temp_recent_tweets, 0, 30);

        foreach ($sliced_array as $key => $value) {
            $recent_tweets[] = $value;
        }

        return $recent_tweets;
    }

    function getMostRecentReplies($tweets)
    {
        $recent_tweets = [];
        $temp_recent_tweets = [];

        foreach ($tweets as $tweet) {
            if ((!isset($tweet->retweeted_status)) && $tweet->in_reply_to_screen_name !== null) {
                $temp_recent_tweets[$tweet->user->screen_name] = ["tweet_data" => $tweet];
            }
        }

        $sliced_array = array_slice($temp_recent_tweets, 0, 30);

        foreach ($sliced_array as $key => $value) {
            $recent_tweets[] = $value;
        }

        return $recent_tweets;
    }

    function getOriginalContributorsData($tweets, $user)
    {
        $user_data = [];
        $sorted_user_data = [];

        foreach ($tweets as $tweet) {
            if ($tweet->in_reply_to_user_id === null && !isset($tweet->retweeted_status)) {
                if (array_key_exists($tweet->user->screen_name, $user_data)) {
                    $user_data[$tweet->user->screen_name] = [
                        'tweet_count' => $user_data[$tweet->user->screen_name]['tweet_count'] + 1,
                        'followers' => $tweet->user->followers_count,
                        'data' => $tweet->user,
                    ];
                } else {
                    $user_data[$tweet->user->screen_name] = [
                        'tweet_count' => 1,
                        'followers' => $tweet->user->followers_count,
                        'data' => $tweet->user,
                    ];
                }
            }
        }

        usort($user_data, function ($a, $b) {
            return $b['tweet_count'] - $a['tweet_count'];
        });

        foreach ($user_data as $key => $value) {
            $sorted_user_data[] = [
                'tweet_count' => $user_data[$key]['tweet_count'],
                'impacts' => $this->getOriginalContributorImpacts($user_data[$key]['tweet_count'], $user_data[$key]['followers']),
                'data' => $user_data[$key]['data'],
            ];
        }

        $top_sorted_user_data = $this->sortOriginalContributorImpacts($sorted_user_data);

        // Return just 30
        $sorted_user_data = array_slice($sorted_user_data, 0, 30);
        $top_sorted_user_data = array_slice($top_sorted_user_data, 0, 30);

        return ['original_contributors' => $sorted_user_data, 'top_original_contributors' => $top_sorted_user_data];
    }

    function sortOriginalContributorImpacts($original_contributor_array)
    {
        usort($original_contributor_array, function ($a, $b) {
            return $b['impacts'] - $a['impacts'];
        });

        return $original_contributor_array;
    }

    function getOriginalContributorImpacts($tweet_count, $followers)
    {
        $reach = $followers * 0.3;
        $impacts = $reach * $tweet_count;
        return $impacts;
    }

    function getImpressions($reach, $no_of_tweets)
    {
        $impressions = $reach * $no_of_tweets;
        return $impressions;
    }


    function getAllProfileData()
    {

        $user = $this->authenticate();

        if (!$user) return response(['status' => 'error', 'message' => 'Unauthenticated user']);

        $handle = request()->q;

        if (request()->has('plan')) {
            $package = Subscription::where('name', request()->plan)->first();
        } else {
            $package = $user->subscription->plan;
        }


        if (!$handle) {
            return response(['status' => 'error', 'message' => 'Please specify a user handle to query'], 403);
        }


        $data = [];

        $profileData = $this->getUserProfile($handle);


        if (!$profileData) {
            return response(['status' => 'error', 'message' => 'Error retrieving user profile'], 403);
        }

        if ($profileData) {
            $data['profile'] = $profileData;
        }
        $userTweets = $this->getUserTweets($handle);

        if ($package->name == 'basic' || $package->name == 'premiumBusiness' || $package->name == 'premiumLite' || $package->name == 'enterprise') {
            $premiumData = new PremiumTwitterAPIController;
            $userTweets = $premiumData->getAllProfileData($handle, $user);
        }

        if ($userTweets) {
            $data['recent_tweets'] = array_slice($userTweets, 0, 30);
        }

        $data['date_from'] = \Carbon\Carbon::now()->subDays($package->days)->toDayDateTimeString();

        $data['date_to'] = \Carbon\Carbon::now()->toDayDateTimeString();

        $data['profile_location'] = $profileData->location ?? 'Not specified';

        $data['retweets'] =  $this->getProfileHighestRetweets($userTweets);

        $engagement = $this->getEngagementData($profileData, $userTweets);

        $data['engagement_rate'] = $engagement->er ?? 0;

        $data['impressions'] = $engagement->impressions ?? 0;

        $data['reach'] = $engagement->reach ?? 0;

        $data['total_engagements'] = $engagement->total_engagements ?? 0;

        $data['total_posts'] = count($userTweets);

        $data['avr_likes'] = $engagement->avrLikes ?? 0;

        $data['avr_retweets'] = $engagement->avrRetweets ?? 0;

        $data['media_meta_data'] = $this->getTweetsMedia($userTweets);

        if (request()->reload == true) {
            Subscription::where('user_id', $user->id)->decrement('profiling_balance', 1);

            ProfilingHistory::where(['user_id' => $user->id, 'handle' => $handle])->update([
                'report_data' => json_encode($data),
                'package' => $package->id,
            ]);
        }

        $profile = ProfilingHistory::where(['user_id' => $user->id, 'handle' => $handle])->first();

        if (!$profile) {
            Subscription::where('user_id', $user->id)->decrement('profiling_balance', 1);

            try {
                $profile = ProfilingHistory::create([
                    'user_id' => $user->id,
                    'handle' => $handle,
                    'report_data' => json_encode($data),
                    'package' => $package->id,
                ]);
            } catch (Exception $e) {
                return response([
                    "status" => 500,
                    "message" => "failed to get campaigns " . $e,
                ], 500);
            }
        }

        Account::where('handle', 'LIKE', "%$handle%")->update(['er' => $data['engagement_rate']]);

        return response(['status' => 'success', 'data' => $data, 'id' => $profile->id], 200);
    }

    function getProfileHighestRetweets($tweets, $isHashtag = false)
    {
        $temp_store_tweets = [];

        foreach ($tweets as $tweet) {
            if (!isset($tweet->retweeted_status) && $tweet->in_reply_to_screen_name === null && $isHashtag === true) {
                $temp_store_tweets[] = $tweet;
            }

            if ($isHashtag === false) {
                $temp_store_tweets[] = $tweet;
            }
        }

        usort($temp_store_tweets, function ($a, $b) {
            if ($b->retweet_count == $a->retweet_count) {
                return 0;
            }

            return $b->retweet_count - $a->retweet_count;
        });
        $unique_array = array_unique($temp_store_tweets, SORT_REGULAR);

        $topRetweets = array_slice($unique_array, 0, 30);
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
            $retweets += $tweet->retweet_count;
            $likes += $tweet->favorite_count;
            $quotes += isset($tweet->quote_count) ? $tweet->quote_count : 0;
            $replies += isset($tweet->reply_count) ? $tweet->reply_count : 0;
        }


        $obj = new \stdClass;

        $obj->avrLikes = ceil($likes / $total_tweets);
        $obj->avrRetweets = ceil($retweets / $total_tweets);

        $reach = $profile->followers_count * 0.3;
        $impressions = $reach * $total_tweets;
        $total_engagements = $likes + $retweets + $quotes + $replies;

        // $er = round((float) (($likes + $retweets + $replies + $quotes) / ($profile->followers_count)), 2);
        $accurate_engagement_rate = round((float) (($likes + $retweets + $replies + $quotes) / $impressions) * 1000, 2);

        $obj->er = $accurate_engagement_rate;
        $obj->impressions = $impressions;
        $obj->reach = $reach;
        $obj->total_engagements = $total_engagements;

        return $obj;
    }

    function getHashtagEngagementData($tweets, $reach)
    {
        $likes = 0;
        $retweets = 0;
        $quotes = 0;
        $replies = 0;

        if (count($tweets) < 1) {
            return;
        }

        foreach ($tweets as $tweet) {
            $retweets += $tweet->retweet_count;
            $likes += $tweet->favorite_count;
            $quotes += isset($tweet->quote_count) ? $tweet->quote_count : 0;
            $replies += isset($tweet->reply_count) ? $tweet->reply_count : 0;
        }



        $er = round((float) ((($likes + $retweets + $replies + $quotes) / ($reach)) * 1000), 2);

        return $er;
    }

    function getTotalEngagements($tweets)
    {
        $likes = 0;
        $retweets = 0;
        $quotes = 0;
        $replies = 0;

        if (count($tweets) < 1) {
            return;
        }

        foreach ($tweets as $tweet) {
            $retweets += $tweet->retweet_count;
            $likes += $tweet->favorite_count;
            $quotes += isset($tweet->quote_count) ? $tweet->quote_count : 0;
            $replies += isset($tweet->reply_count) ? $tweet->reply_count : 0;
        }



        $total_engagements = $likes + $retweets + $replies + $quotes;

        return $total_engagements;
    }



    // function getAllHashtagData() {

    //     $handle = request()->q;

    //     if(!$handle) {
    //         return response(['status' => 'error', 'message' => 'Please specify an hashtag to query'], 403);
    //     }

    //     $data = [];

    //     $userTweets = $this->getHashtagTweets($handle);

    //     if($userTweets) {
    //         $data['tweets'] = $userTweets;
    //     }

    //     $data['media_tweets_count'] = $this->getTweetsMedia($userTweets);

    //     $data['retweeters'] = $this->getTopRetweeters($this->retweetersList($userTweets));

    //     return $data;
    // }


    function getUserProfile($value, $search_by = 'screen_name')
    {
        //        $this->connect();

        //        $profile = $this->connection->get("users/show", [$search_by => $value]);
        $profile = $this->guzzleClient('users/show', [$search_by => $value]);

        if (isset($profile->error)) {
            return;
        }


        return $profile;
    }


    function getUserTweets($handle)
    {
        $tweets = $this->guzzleClient('statuses/user_timeline', ['screen_name' => $handle, 'count' => 500, 'include_rts' => false, 'exclude_replies' => true]);
        if (isset($tweets->error)) {
            return;
        }

        return $tweets;
    }


    function getHashtagTweetsData($tweets, $user, $type = '', $top = false)
    {
        $_tweets = [];
        $total_tweets = count($tweets);
        $total_count = 0;

        if ($total_tweets > 0) {
            foreach ($tweets as $tweet) {
                switch ($type) {
                    case 'retweets':
                        if (isset($tweet->retweeted_status)) {
                            $_tweets[] = $tweet;
                            $total_count += 1;
                            //$tweet->retweeted_status->retweet_count
                        }
                        break;
                    case 'likes':
                        $_tweets[] = $tweet;
                        $total_count += $tweet->favorite_count;
                        break;
                    case 'original':
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

        if ($user->subscription->plan->name == 'Free') {
            $data = array_reverse($data);
        }

        $data = array_slice($data, 0, 20);
        return ['count' => $total_count, 'data' => $data, 'percentage' => ceil(($total_count / $total_tweets) * 100)];
    }


    function getUniqueContributors($tweets)
    {
        $accounts = [];
        $data = [];
        $data['unique_users'] = 0;
        $data['avr_contribution']  = 0;

        if (count($tweets) > 0 && is_array($tweets)) {
            foreach ($tweets as $tweet) {
                $accounts[] = $tweet->user->screen_name; //get all usernames to sort occurence count
            }

            $data['unique_users'] = count(array_unique($accounts));
            $data['avr_contribution'] = round(count($tweets) / count(array_unique($accounts)), 2);
        }

        return $data;
    }

    function getHashtagReach($tweets, $contribution)
    {
        $accounts = [];
        $profiles = [];
        $avg_contribution = $contribution['avr_contribution'];

        foreach ($tweets as $tweet) {
            $accounts[] = $tweet->user->screen_name; //get all usernames to sort occurence count
            $profiles[$tweet->user->screen_name] = $tweet->user;
        }

        $users = array_unique($accounts);
        $total_followers = 0;
        $total_following = 0;
        $reach = [];

        foreach ($users as $user) {
            $total_followers += $profiles[$user]->followers_count;
            //            $total_following += $profiles[$user]->friends_count;
        }

        // Impact = total number of retweets * total number of followers

        switch (true) {
            case ($avg_contribution > 4.5):
                $percentage = ($avg_contribution / 100) * 90;
                break;
            case ($avg_contribution <= 4.5 && $avg_contribution >= 3.5):
                $percentage = ($avg_contribution / 100) * 85;
                break;
            case ($avg_contribution <= 3.5 && $avg_contribution >= 2.5):
                $percentage = ($avg_contribution / 100) * 75;
                break;

            default:
                $percentage =  65;
                break;
        }

        $impact = round($total_followers * $percentage);
        $reach = round($total_followers * 0.3);

        return ['impact' => $impact, 'reach' => $reach, 'followers' => $total_followers];
    }

    function getTopHashImpactsData($tweets, $user)
    {

        $accounts = [];
        $profiles = [];
        $sorted = [];

        foreach ($tweets as $tweet) {
            $accounts[] = $tweet->user->screen_name; //get all usernames to sort occurence count
            $profiles[$tweet->user->screen_name] = $tweet->user; //Save the profiles of all accounts pending next use
        }
        $new_array = array_count_values($accounts); //Sort all according to counts of tweets per person

        $count = 1;

        switch ($user->subscription->plan->name) {
            case ('premiumLite'):
                $account_limit = 15;
                break;
            case ('premiumBusiness'):
                $account_limit = 20;
                break;
            case ('enterprise'):
                $account_limit = 25;
                break;
            default:
                $account_limit = 5;
                break;
        }

        $sum = 0;
        //Return all data with the details user profiles and account name
        foreach ($new_array as $key => $value) {
            $sorted[] = [
                'user' => $profiles[$key],
                'count' => $value * $profiles[$key]->followers_count,
                'tweets_count' => $value
            ];
            $sum +=  $value * $profiles[$key]->followers_count;
        }

        usort($sorted, function ($a, $b) {
            return $a['count'] <=> $b['count'];
        });

        $sorted = array_slice(array_reverse($sorted), 0, $account_limit);

        if ($user->subscription->plan->name == 'Free') {
            $sorted = array_reverse($sorted);
        }

        return ['sum' => $sum, 'sorted' => array_slice($sorted, 0, 30)];
    }

    function getTopHashTagData($tweets, $user)
    {

        $accounts = [];
        $profiles = [];
        $sorted = [];

        foreach ($tweets as $tweet) {
            $accounts[] = $tweet->user->screen_name; //get all usernames to sort occurence count
            $profiles[$tweet->user->screen_name] = ['user' => $tweet->user, 'tweet' => $tweet]; //Save the profiles of all accounts pending next use
        }
        $new_array = array_reverse(Arr::sort(array_count_values($accounts))); //Sort all according to counts

        $count = 1;

        $account_limit = 5;
        switch ($user->subscription->plan->name) {
            case ('premiumLite'):
                $account_limit = 15;
                break;
            case ('premiumBusiness'):
                $account_limit = 20;
                break;
            case ('enterprise'):
                $account_limit = 25;
                break;
            default:
                $account_limit = 5;
                break;
        }
        //Return all data with the details user profiles and account name
        foreach ($new_array as $key => $value) {
            $sorted[] = [
                'user' => $profiles[$key]['user'],
                'count' => $value,
                'tweet' => $profiles[$key]['tweet'] //Added to display the tweets
            ];
            if ($count == $account_limit) break;
            $count++;
        }

        if ($user->subscription->plan->name == 'Free') {
            $sorted = array_reverse($sorted);
        }

        $sorted = array_slice($sorted, 0, 20);
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
        $sorted = [];
        foreach ($accounts as $key => $value) {
            $listed[$value] = $key;
            $_followers[] = $value;
        }

        $reversed = array_unique(array_reverse($accounts));

        $count = 1;

        switch ($user->subscription->plan->name) {
            case ('premiumLite'):
                $account_limit = 15;
                break;
            case ('premiumBusiness'):
                $account_limit = 20;
                break;
            case ('enterprise'):
                $account_limit = 25;
                break;
            default:
                $account_limit = 5;
                break;
        }

        foreach ($reversed as $value) {
            $sorted[] = [
                'user' => $tweets[$listed[$value]]->user,
                'count' => $value
            ];
            if ($count == $account_limit) break;
            $count++;
        }

        if ($user->subscription->plan->name == 'Free') {
            $sorted = array_reverse($sorted);
        }


        return array_slice($sorted, 0, 30); //Return only the first 30 of the result
    }

    function getHashtagHighImpactUsers($tweets, $user)
    {

        $followers = [];
        $sorted = [];

        foreach ($tweets as $tweet) {
            $accounts[] = $tweet->user->followers_count;
        }

        asort($accounts);
        $_followers = [];
        $listed = [];
        foreach ($accounts as $key => $value) {
            $listed[$value] = $key;
            $_followers[] = $value;
        }

        $reversed = array_reverse(array_unique($_followers));

        $count = 1;

        switch ($user->subscription->plan->name) {
            case ('premiumLite'):
                $account_limit = 15;
                break;
            case ('premiumBusiness'):
                $account_limit = 20;
                break;
            case ('enterprise'):
                $account_limit = 25;
                break;
            default:
                $account_limit = 5;
                break;
        }

        foreach ($reversed as $value) {
            $sorted[] = [
                'user' => $tweets[$listed[$value]]->user,
                'count' => $value
            ];
            if ($count == $account_limit) break;
            $count++;
        }

        if ($user->subscription->plan->name == 'Free') {
            $sorted = array_reverse($sorted);
        }

        return $sorted;
    }

    function getTweetsMedia($tweets, $type = 'profile')
    {

        $media_tweets = [];
        $total_tweets = count($tweets);


        if ($total_tweets > 0) {
            foreach ($tweets as $tweet) {
                if (isset($tweet->entities->media)) {
                    $media_tweets[] = $tweet;
                }
            }
        }

        $total_media_tweets = count($media_tweets);

        $text_tweets = $total_tweets - $total_media_tweets;

        $text_tweets_percentage = ceil(($text_tweets / $total_tweets) * 100);
        $media_tweets_percentage = 100 - $text_tweets_percentage;

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

        if (isset($accounts->error) || count($accounts->ids) == 0) {
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

    public function trending()
    {
        $connection = new TwitterOAuth(
            env('TWITTER_CONSUMER_KEY'),
            env('TWITTER_CONSUMER_SECRET'),
            env('TWITTER_ACCESS_TOKEN'),
            env('TWITTER_TOKEN_SECRET')
        );

        $trends = $connection->get('trends/place', ['id' => '23424908']);

        if (isset($trends->error)) {
            return response(['message' => 'Error fetching trends at the moment', 'status' => 'error']);
        }

        if ($trends[0]->trends) {
            $trends = $trends[0]->trends;
        } else {
            $trends = [];
        }

        return response(['data' => $trends, 'status' => 'success']);
    }


    function guzzleClient($path, $data, $token = '', $secret = '')
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
    }
}
