<?php

namespace App\Http\Controllers\BBN;

ini_set("memory_limit", -1);

set_time_limit(0);

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

use App\User;
use App\BBN;
use App\BBNProfiling;
use DateTime;
use Illuminate\Support\Carbon;

use Exception;

class BBNDataController extends Controller
{
    //
    private $connection;
    private $_temporary_parameters;

    function connect()
    {
        $this->connection = new TwitterOAuth(
            env('TWITTER_CONSUMER_KEY'),
            env('TWITTER_CONSUMER_SECRET'),
            env('TWITTER_ACCESS_TOKEN'),
            env('TWITTER_TOKEN_SECRET')
        );

        $this->connection->setTimeouts(9999, 9999);
    }

    function authenticate()
    {
        $auth_data = explode(' ', request()->header('Authorization'));
        $token = $auth_data[1];
        $user = User::where('api_token', $token)->first();

        return $user;
    }

    function getMostMentionedHousemates($tweets)
    {
        $housemate_numbers = [];
        $sorted_housemates = [];

        $house_mates = [
            'Ozo', 'Vee', 'Prince', 'Lilo',
            'Trickytee', 'Lucy', 'Kiddwaya', 'Dorathy',
            'Praise', 'Wathoni', 'Tochi', 'Kazna', 'Eric ',
            'Erica', 'Bright', 'Kaisha', 'Neo', 'Tolanibaj',
            'Laycon', 'Nengi', 'Ozo'
        ];

        foreach ($tweets as $tweet) {
            foreach ($house_mates as $house_mate) {
                if (isset($tweet->full_text) && strpos($tweet->full_text, $house_mate) !== false) {
                    if (array_key_exists($house_mate, $housemate_numbers)) {
                        $housemate_numbers[$house_mate] = $housemate_numbers[$house_mate] + 1;
                    }

                    if (!array_key_exists($house_mate, $housemate_numbers)) {
                        $housemate_numbers += array_merge($housemate_numbers, [$house_mate => 1]);
                    }
                }

                if (isset($tweet->text) && strpos($tweet->text, $house_mate) !== false) {
                    if (array_key_exists($house_mate, $housemate_numbers)) {
                        $housemate_numbers[$house_mate] = $housemate_numbers[$house_mate] + 1;
                    }

                    if (!array_key_exists($house_mate, $housemate_numbers)) {
                        $housemate_numbers += array_merge($housemate_numbers, [$house_mate => 1]);
                    }
                }
            }
        }

        arsort($housemate_numbers);

        foreach ($housemate_numbers as $key => $value) {
            $sorted_housemates[] = [
                'name' => $key,
                'count' => $value,
            ];
        }

        return $sorted_housemates;
    }

    function saveTweets($user_id, $tweets)
    {
        try {
            $report = BBN::create([
                'user_id' => $user_id,
                'query' => 'tweets',
                'report_data' => json_encode($tweets),
            ]);

            return response(
                [
                    "status" => 500,
                    "message" => "saved!",
                ],
                500
            );
        } catch (Exception $e) {
            return response([
                "status" => 500,
                "message" => "failed to create trends report " . $e->getMessage(),
            ], 500);
        }
    }

    function mergeTweets($query)
    {
        // Fetch and merge
        $tweets = BBN::where(['query' => $query])->get();

        $allTweets = [];

        foreach ($tweets as $tweet) {
            foreach (json_decode($tweet['report_data']) as $tweetData) {
                $allTweets[] = $tweetData;
            }
        }

        return $allTweets;
    }

    function getHashtagTweets(Request $request)
    {
        $query = 'BBNaija';

        if (!$query) {
            return response(['status' => 'error', 'message' => 'Please specify a user handle to query'], 403);
        }

        $report = BBN::where(['query' => $query])->first();

        if ($report) {
            $data['data'] = json_decode(json_encode($report->report_data));

            $high_tweets['highest_retweeted_tweets'] = json_decode(json_encode($report->highest_retweeted_tweets));

            $data['handle'] = $report->query;

            return response([
                'status' => 'success',
                'id' => $report->id,
                'data' => $data,
                'most_mentioned_housemates' => json_decode(
                    json_encode($report->most_mentioned_housemates)
                ),
                'high_tweets' => $high_tweets,
            ], 200);
        }

        // $tweets = $this->getManagementHashtagTweets($query);

        // $this->saveTweets($user->id, $tweets);

        // return response([
        //     'status' => 500,
        //     'message' => 'saved!',
        // ], 500);

        // dd('done');

        $tweets = $this->mergeTweets($query);

        $data = [];
        $high_tweets = [];

        if (count($tweets) > 0) {
            $data['count'] = count($tweets);
        } else {
            return response(['message' => 'cannot retrieve tweets'], 500);
        }

        $contribution = $this->getUniqueContributors($tweets);
        $reach = $this->getHashtagReach($tweets, $contribution);

        $most_mentioned_housemates = $this->getMostMentionedHousemates($tweets);

        $data['date_from'] = \Carbon\Carbon::parse('2020-07-23')->toDayDateTimeString();
        $data['date_to'] = \Carbon\Carbon::parse('2020-08-23')->toDayDateTimeString();

        $data['retweets'] =  $this->getHashtagTweetsData($tweets, $user, 'retweets', true)['count'];
        $data['replies'] =  $this->getHashtagTweetsData($tweets, $user, 'replies')['count'];
        $data['high_likes'] =  $this->getHashtagTweetsData($tweets, $user, 'likes', true)['count'];
        $data['most_active'] = $this->getHashtagTweetsData($tweets, $user, 'original', true)['count'];

        $highest_retweeted_tweets = $this->getProfileHighestRetweets($tweets, true);

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
        $data['engagement_rate'] = $this->getHashtagEngagementData($tweets, $reach['reach']);

        $report = BBN::where(['query' => 'BBNaija'])->first();

        if (!$report) {
            try {
                $report = BBN::create([
                    'query' => 'BBNaija',
                    'report_data' => json_encode($data),
                    'most_mentioned_housemates' => json_encode($most_mentioned_housemates),
                    'highest_retweeted_tweets' => json_encode($highest_retweeted_tweets),
                ]);
            } catch (Exception $e) {
                return response([
                    "status" => 500,
                    "message" => "failed to create trends report " . $e->getMessage(),
                ], 500);
            }
        }

        return response([
            'status' => 'success',
            'data' => $data,
            'most_mentioned_housemates' => $most_mentioned_housemates,
            'id' => $report->id
        ], 200);
    }

    function getManagementHashtagTweets($query)
    {
        $page = 0;
        $next = "";
        $searching = true;
        $tweets_array = [];

        $count = 500;
        // $count = 100;

        // Set days here
        $batch1_from = '202008200000';
        $batch1_to = '202008240000'; // Done

        $batch2_from = '202008150000';
        $batch2_to = '202008190000'; // Done

        $batch3_from = '202008100000';
        $batch3_to = '202008140000'; // Done

        $batch4_from = '202008050000';
        $batch4_to = '202008090000'; // Done

        $batch5_from = '202007310000';
        $batch5_to = '202008040000'; // Done

        $batch6_from = '202007260000';
        $batch6_to = '202007300000'; // Done

        $batch7_from = '202007240000';
        $batch7_to = '202007250000';

        $fromDate = '202007240000';
        $toDate = '202008240000';

        while ($searching) {
            if ($page === 0) {
                $this->_temporary_parameters = [
                    "query" => $query,
                    "maxResults" => $count,
                    "fromDate" => $batch7_from,
                    'toDate' => $batch7_to,
                ];
            } else {
                $this->_temporary_parameters = [
                    "query" => $query,
                    "maxResults" => $count,
                    "fromDate" => $batch7_from,
                    'toDate' => $batch7_to,
                    "next" => $next
                ];
            }

            try {
                $this->connect();
                $tweets_result = $this->connection->get("tweets/search/" . env('TWITTER_API_TYPE') . "/" . env('TWITTER__APP_DEVELOPMENT_NAME'), $this->_temporary_parameters);
                $page++;
            } catch (\Exception $e) {
                // return error response
                return $e->getMessage();
            }

            if (isset($tweets_result->error)) {
                return response([
                    'status' => 500,
                    'message' => $tweets_result,
                ], 500);
            }

            if (isset($tweets_result->results)) {
                foreach ($tweets_result->results as $status) {
                    $tweets_array[] = $status;
                }
            }

            if ($page === 1) {
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

    public function getCampaignSummary($user_id = '', $influencers = [], $keyword = '', $plan_id = '', $user_details_id = '')
    {
        if (trim($user_details_id) == '') {
            $user_details_id = request()->user_details_id;
        }

        // If not scheduling
        if (trim($user_id) == '') {
            $user = $this->authenticate();
            $user_id = $user->id;
            $influencers = request()->influencers;
            $keyword = request()->keyword;
            $plan_id = request()->plan_id;

            $influencers_array = json_decode($influencers);

            $report = SummaryHistory::where(['user_details_id' => $user_details_id])->first();

            if ($report) {
                $data['keyword'] = $report->keyword;
                $data['report_type'] = $report->plan->name;
                $data['data'] = json_decode(json_encode($report->report_data));
                $data['influencers'] = $report->influencers;

                return response(['status' => 'success', 'data' => $data, 'id' => $report->id], 200);
            }
        }

        try {
            $user_details = UserDetailsManagement::where(['id' => $user_details_id])->first();
        } catch (Exception $e) {
            $e->getMessage();
        }

        try {
            $plan_days = InfluencerManagementPlan::where(['id' => $user_details->plan_id])->first();
        } catch (Exception $e) {
            $e->getMessage();
        }

        if ($this->isPlanExpired($user_details_id, $plan_days->days)) {
            return response([
                'status' => 500,
                'message' => 'plan expired, please purchase a new plan',
            ], 500);
        }
        $influencers_array = json_decode($influencers);

        $userTweets = [];
        foreach ($influencers_array as $handle) {
            $userTweets[$handle] = $this->getUserTweets($handle, $keyword);
        }

        $all_influencer_tweets = [];
        $engagementRate = 0;
        $impressions = 0;
        $reach = 0;

        if (count($userTweets) == 0) {
            return response([
                'message' => 'Could not retrieve tweets',
                'tweet_count' => count($userTweets),
            ], 500);
        }

        foreach ($userTweets as $tweets) {
            if (count($tweets) == 0) {
                continue;
            }

            foreach ($tweets as $tweet) {
                array_push($all_influencer_tweets, $tweet);
            }

            $calculations = ['er', 'impressions', 'reach'];
            foreach ($calculations as $calculation) {
                try {
                    if ($calculation == 'er') {
                        $engagementRate += $this->getEngagementData($tweets[0]->user, $tweets)[$calculation];
                    }

                    if ($calculation == 'impressions') {
                        $impressions += $this->getEngagementData($tweets[0]->user, $tweets)[$calculation];
                    }

                    if ($calculation == 'reach') {
                        $reach += $this->getEngagementData($tweets[0]->user, $tweets)[$calculation];
                    }
                } catch (Exception $e) {
                    continue;
                }
            }
        }

        $start_date = \Carbon\Carbon::parse($user_details->date);
        $end_date = \Carbon\Carbon::now();

        $data['date_from'] = $start_date->toDayDateTimeString();
        $data['date_to'] = $end_date->toDayDateTimeString();

        $data['report_type_days'] = $start_date->diffInDays($end_date);

        $data['engagement_rate'] = $engagementRate;

        $data['impressions'] = $impressions;

        $data['reach'] = $reach;

        $data['total_tweets'] = $this->getSummaryEngagements($all_influencer_tweets)['total_tweets'];

        $data['total_retweets'] = $this->getSummaryEngagements($all_influencer_tweets)['total_retweets'];

        $data['total_likes'] = $this->getSummaryEngagements($all_influencer_tweets)['total_likes'];

        $data['total_engagements'] = $this->getSummaryEngagements($all_influencer_tweets)['total_engagements'];

        $data['campaign_value'] = ($impressions / 1000) * 80;

        $report = SummaryHistory::where(['user_id' => $user_id, 'user_details_id' => $user_details_id])->first();

        if (!$report) {
            try {
                $report = SummaryHistory::create([
                    'user_id' => $user_id,
                    'user_details_id' => $user_details_id,
                    'influencers' => $influencers,
                    'keyword' => $keyword,
                    'report_data' => json_encode($data),
                    'package' => $plan_id
                ]);
            } catch (Exception $e) {
                return response([
                    "status" => 500,
                    "message" => "failed to get influencers profile " . $e->getMessage(),
                ], 500);
            }
        } else {
            try {
                SummaryHistory::where(['user_details_id' => $user_details_id])->update(['report_data' => json_encode($data)]);
            } catch (Exception $e) {
                dd('catch error ' . $e->getMessage());
            }
        }

        return response(['status' => 'success', 'data' => $data, 'id' => $report->id], 200);
    }

    function getSummaryEngagements($tweets)
    {
        $total_tweets = count($tweets);
        $total_retweets = 0;
        $total_likes = 0;

        foreach ($tweets as $tweet) {
            $total_likes += $tweet->favorite_count;
            $total_retweets += $tweet->retweet_count;
        }

        $total_engagements = $total_likes + $total_retweets;

        return [
            'total_tweets' => $total_tweets,
            'total_likes' => $total_likes,
            'total_engagements' => $total_engagements,
            'total_retweets' => $total_retweets,
        ];
    }

    function getAllProfileData()
    {
        // $user = $this->authenticate();

        // if (!$user) return response(['status' => 'error', 'message' => 'Unauthenticated user']);

        $handle = request()->handle;

        $keyword = '#BBNaija';

        if (!$handle) {
            return response(['status' => 'error', 'message' => 'Please specify a user handle to query'], 403);
        }

        $profiling_report = BBNProfiling::where(['handle' => $handle])->first();

        if ($profiling_report) {
            return response([
                'status' => 200,
                'handle' => $profiling_report->handle,
                'data' => json_decode(json_encode($profiling_report->report_data)),
                'most_mentioned_housemates' => $profiling_report->most_mentioned_housemates,
                'id' => $profiling_report->id
            ], 200);
        }

        $data = [];

        $profileData = $this->getUserProfile($handle);

        if (!$profileData) {
            return response(['status' => 'error', 'message' => 'Error retrieving user profile'], 403);
        }

        if ($profileData) {
            $data['profile'] = $profileData;
        }

        $userTweets = $this->getUserTweets($handle, $keyword);

        $most_mentioned_housemates = $this->getMostMentionedHousemates($userTweets);

        $replies = 0;

        foreach($userTweets as $tweets){
            if($tweets->in_reply_to_user_id != null){
                $replies++;
            }
        }

        // return response([
        //     'data' => $userTweets,
        //     'replies' => $replies,
        // ]);

        if ($userTweets) {
            $data['recent_tweets'] = array_slice($userTweets, 0, 30);
        }

        $start_date = \Carbon\Carbon::parse(
            '2020-08-01'
        );

        $end_date = \Carbon\Carbon::parse(
            '2020-08-30'
        );

       

        if (strtolower($handle) === 'auntyadaa') {
            $start_date = \Carbon\Carbon::parse(
                '2020-09-01'
            );

            $end_date = \Carbon\Carbon::parse(
                '2020-09-21'
            );
        }

        $data['date_from'] = $start_date->toDayDateTimeString();
        $data['date_to'] = $end_date->toDayDateTimeString();

        $data['report_type_days'] = $start_date->diffInDays($end_date);

        $data['profile_location'] = $profileData->location ?? 'Not specified';

        $data['retweets'] =  $this->getProfileHighestRetweets($userTweets);

        $engagement = $this->getEngagementData($profileData, $userTweets);

        $data['engagement_rate'] = $engagement['er'] ?? 0;

        $data['impressions'] = $engagement['impressions'] ?? 0;

        $data['campaign_value'] = ($engagement['impressions'] / 1000) * 80;

        $data['reach'] = $engagement['reach'] ?? 0;

        $data['total_engagements'] = $engagement['total_engagements'] ?? 0;

        $data['total_posts'] = count($userTweets);

        $data['avr_likes'] = $engagement['avrLikes'] ?? 0;

        $data['avr_retweets'] = $engagement['avrRetweets'] ?? 0;

        $data['media_meta_data'] = $this->getTweetsMedia($userTweets);

        $data['replies'] = $replies;

        $report = BBNProfiling::where(['handle' => $handle])->first();

        if (!$report) {
            try {
                $report = BBNProfiling::create([
                    'handle' => $handle,
                    'most_mentioned_housemates' => json_encode($most_mentioned_housemates),
                    'report_data' => json_encode($data),
                ]);
            } catch (Exception $e) {
                return response([
                    "status" => 500,
                    "message" => "failed to create influencer bbn profile " . $e->getMessage(),
                ], 500);
            }
        }

        return response([
            'status' => 200,
            'most_mentioned_housemates' => $report->most_mentioned_housemates,
            'data' => json_encode($data),
            'id' => $report->id
        ], 200);
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

        $topRetweets = array_slice($unique_array, 0, 20);
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

        $avrLikes = ceil($likes / $total_tweets);
        $avrRetweets = ceil($retweets / $total_tweets);

        $reach = $profile->followers_count * 0.3;
        $impressions = $reach * $total_tweets;
        $total_engagements = $likes + $retweets + $quotes + $replies;

        // $er = round((float) (($likes + $retweets + $replies + $quotes) / ($profile->followers_count)), 2);
        $accurate_engagement_rate = round((float) (($likes + $retweets + $replies + $quotes) / $impressions) * 1000, 2);

        $obj->er = $accurate_engagement_rate;
        $obj->impressions = $impressions;
        $obj->reach = $reach;
        $obj->total_engagements = $total_engagements;

        // return $obj;
        return [
            'er' => $accurate_engagement_rate,
            'impressions' => $impressions,
            'reach' => $reach,
            'total_engagements' => $total_engagements,
            'avrLikes' => $avrLikes,
            'avrRetweets' => $avrRetweets,
        ];
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

    function getUserProfile($value, $search_by = 'screen_name')
    {
        $profile = $this->guzzleClient('users/show', [$search_by => $value]);

        if (isset($profile->error)) {
            return;
        }

        return $profile;
    }

    function isTimeInRange($time, $alternative_time = false){
        $getTimestamp = Carbon::parse($time)->timestamp;
        $startDate = Carbon::parse('2020-08-01')->timestamp;
        $endDate  = Carbon::parse('2020-08-30')->timestamp;

        if($alternative_time === true){
            $startDate = Carbon::parse('2020-09-03')->timestamp;
            $endDate  = Carbon::parse('2020-09-30')->timestamp;
        }

        if($getTimestamp > $startDate && $getTimestamp < $endDate){
            return true;
        }

        return false;
    }

    function getUserTweets($handle, $keyword)
    {
        $is_searching = true;
        $filtered_tweets = [];

        $initialQuery = [
            'screen_name' => $handle,
            'count' => 200,
            "tweet_mode" => "extended",
            // 'include_rts' => false,
            // 'exclude_replies' => true,
        ];

        $max_id = 0;
        $page = 0;

        while ($is_searching) {
            try {
                $this->connect();
                $influencerTweets = $this->connection->get('statuses/user_timeline', $initialQuery);
                $page++;
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
                    if (stripos($tweets->full_text, $keyword) !== false) {
                        if(strtolower($handle) !== 'auntyadaa'){
                            if($this->isTimeInRange($tweets->created_at)){
                                $filtered_tweets[] = $tweets;
                            }
                        }
                        
                        if(strtolower($handle) === 'auntyadaa'){
                            if($this->isTimeInRange($tweets->created_at, true)){
                                $filtered_tweets[] = $tweets;
                            }
                        }
                    }
                }
            }

            // 200 tweets perpage
            if ($page === 15) {
                $is_searching = false;
            }

            $initialQuery["max_id"] = $max_id;
        }

        return $filtered_tweets;
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

        //'tweets' => $_tweets,
        return ['count' => $total_count, 'data' => $data, 'percentage' => ceil(($total_count / $total_tweets) * 100)];
    }


    function getUniqueContributors($tweets)
    {
        $accounts = [];
        $data = [];
        $data['unique_users'] = 0;
        $data['avr_contribution']  = 0;

        if (count($tweets) > 0) {
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
