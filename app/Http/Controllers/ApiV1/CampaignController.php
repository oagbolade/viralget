<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\ApiV1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\ProfilingHistory;
use App\ReportingHistory;
use App\UserDetailsManagement;
use App\ManagementReportingHistory;
use App\ManagementProfilingHistory;
use App\SummaryHistory;
use App\Scheduler;

use App\Subscription;

use Exception;

class CampaignController extends Controller
{
    protected function authenticate()
    {
        $auth_data = explode(' ', request()->header('Authorization'));
        $token = $auth_data[1];
        $user = User::where('api_token', $token)->first();

        return $user;
    }

    function managementView()
    {
        $user = $this->authenticate();

        if (!$user) return response(['status' => 'error', 'message' => 'Unauthorized user']);

        $campaign_details = new UserDetailsManagement;

        try {
            $campaign_details = UserDetailsManagement::with('influencerManagementPlan')->where(['user_id' => $user->id, 'booking_type' => 'influencer_management'])->orderBy('id', 'desc')->get();

            return response([
                "status" => 200,
                "message" => "successfull",
                "data" => $campaign_details,
            ], 200);
        } catch (Exception $e) {
            return response([
                "status" => 500,
                "message" => "failed to get management campaigns " . $e->getMessage(),
            ], 500);
        }
    }

    function trendsView()
    {
        $user = $this->authenticate();

        if (!$user) return response(['status' => 'error', 'message' => 'Unauthorized user']);

        $campaign_details = new UserDetailsManagement;

        try {
            $campaign_details = UserDetailsManagement::with('trendsPlan')->where(['user_id' => $user->id, 'booking_type' => 'trends'])->orderBy('id', 'desc')->get();

            return response([
                "status" => 200,
                "message" => "successfull",
                "data" => $campaign_details,
            ], 200);
        } catch (Exception $e) {
            return response([
                "status" => 500,
                "message" => "failed to get trends campaigns " . $e->getMessage(),
            ], 500);
        }
    }

    function subscription()
    {
        $user = $this->authenticate();

        $subscription = new Subscription;


        if (!$user) return response(['status' => 'error', 'message' => 'Unauthorized user']);

        try {
            $subscription = $subscription::where('user_id', $user->id)->with('plan')->first();

            return response([
                "status" => 200,
                "message" => "successfull",
                "data" => $subscription,
            ], 200);
        } catch (Exception $e) {
            return response([
                "status" => 500,
                "message" => "failed to get campaigns " . $e->getMessage(),
            ], 500);
        }
    }
    
    function reporting()
    {
        $user = $this->authenticate();
        $hashtag_campaigns = new ReportingHistory;

        if (!$user) return response(['status' => 'error', 'message' => 'Unauthorized user']);

        try {
            $include_columns = ['id', 'user_id', 'query', 'dates', 'created_at', 'description', 'location_set', 'package'];
            $campaigns = $hashtag_campaigns::where('user_id', $user->id)->orderBy('id', 'desc')->get($include_columns);

            return response([
                "status" => 200,
                "message" => "successfull",
                "data" => $campaigns,
            ], 200);
        } catch (Exception $e) {
            return response([
                "status" => 500,
                "message" => "failed to get campaigns " . $e->getMessage(),
            ], 500);
        }
    }
    
    function profiling()
    {
        $user = $this->authenticate();

        $profiling_campaigns = new ProfilingHistory;

        if (!$user) return response(['status' => 'error', 'message' => 'Unauthorized user']);

        try {
            $include_columns = ['id', 'user_id', 'handle', 'created_at', 'description', 'package'];
            $campaigns = $profiling_campaigns::where('user_id', $user->id)->orderBy('id', 'desc')->get($include_columns);

            return response([
                "status" => 200,
                "message" => "successfull",
                "data" => $campaigns,
            ], 200);
        } catch (Exception $e) {
            return response([
                "status" => 500,
                "message" => "failed to get campaigns " . $e->getMessage(),
            ], 500);
        }
    }

    function create()
    {
        if (isset(request()->handle)) {
            return $this->createProfiling();
        } else {
            return $this->createKeyword();
        }
    }

    function createKeyword()
    {
        $user = $this->authenticate();

        if (!$user) return response(['status' => 'error', 'message' => 'Unauthorized user']);
        $location = request()->location;
        $keywords = request()->keywords;
        $dates = json_encode(request()->dates);
        $description = request()->description;
        $user_id = $user->id;

        $campaign = new ReportingHistory;
        $subscription = Subscription::where('user_id', $user->id)->first();

        if ($campaign::where(['query' => request()->keywords, 'user_id' => $user->id])->first()) {
            return response([
                "message" => "query already exists for this user",
                "status" => 400
            ], 400);
        }

        $campaign->query = $keywords;
        $campaign->dates = $dates;
        $campaign->description = $description;
        $campaign->user_id = $user_id;
        $campaign->package = $subscription->plan_id;

        if ($location != null) {
            $campaign->location_set = $location;
        }

        try {
            $campaign->save();
        } catch (Exception $e) {
            return response([
                "message" => "failed to create new report" . $e->getMessage(),
                "status" => 400
            ], 500);
        }

        $data = [
            'keyword' => $keywords,
            'description' => $description,
        ];

        return response([
            "status" => 200,
            "message" => "successfull",
            "data" => $data
        ], 200);
    }

    function createProfiling()
    {
        $user = $this->authenticate();

        if (!$user) return response(['status' => 'error', 'message' => 'Unauthorized user']);

        $handle = request()->handle;
        $description = request()->description;
        $user_id = $user->id;

        $subscription = Subscription::where('user_id', $user->id)->first();
        $create_campaign = new ProfilingHistory;

        if ($create_campaign::where(['handle' => request()->handle, 'user_id' => $user->id])->first()) {
            return response([
                "message" => "query already exists for this user",
                "status" => 400
            ], 400);
        }

        $create_campaign->handle = $handle;
        $create_campaign->description = $description;
        $create_campaign->user_id = $user_id;
        $create_campaign->package = $subscription->plan_id;

        try {
            $create_campaign->save();
        } catch (Exception $e) {
            return response([
                "message" => "failed to create new user profiling" . $e->getMessage(),
                "status" => 400
            ], 500);
        }

        $data = [
            'handle' => $handle,
            'description' => $description,
        ];

        return response([
            "status" => 200,
            "message" => "successfull",
            "data" => $data
        ], 200);
    }

    function delete()
    {
        $campaign = new ReportingHistory;

        if (isset(request()->handle)) {
            $campaign = new ProfilingHistory;
        }
        $campaign_id = request()->campaignId;

        try {
            $campaign = $campaign->where('id', $campaign_id)->delete();

            return response([
                "status" => 200,
                "message" => "successfull",
                "data" => $campaign_id
            ], 200);
        } catch (Exception $e) {
            return response([
                "status" => 500,
                "message" => "failed to delete campaign " . $e->getMessage(),
            ], 500);
        }
    }

    function updateInfluencerManagement()
    {
        $campaign = new UserDetailsManagement;

        $campaign_id = request()->campaignId;
        $influencers = request()->influencers;
        $influencers = explode(",", $influencers);
        $makeString = json_encode($influencers);

        try {
            $campaign = $campaign->where('id', $campaign_id)->update([
                'influencers' => $makeString
            ]);

            return response([
                "status" => 200,
                "message" => "successfull",
                "data" => $campaign_id
            ], 200);
        } catch (Exception $e) {
            return response([
                "status" => 500,
                "message" => "failed to update influencers " . $e->getMessage(),
            ], 500);
        }
    }

    function deleteInfluencerManagement()
    {
        $campaign = new UserDetailsManagement;

        $campaign_id = request()->campaignId;

        try {
            $campaign = $campaign->where('id', $campaign_id)->delete();

            $this->deleteSummaryScheduler($campaign_id);
            $this->deleteSummaryHistories($campaign_id);
            $this->deleteManagementProfilingHistories($campaign_id);

            return response([
                "status" => 200,
                "message" => "successfull",
                "data" => $campaign_id
            ], 200);
        } catch (Exception $e) {
            return response([
                "status" => 500,
                "message" => "failed to delete campaign " . $e,
            ], 500);
        }  
    }
    
    function deleteTrendsManagement()
    {
        $campaign = new UserDetailsManagement;

        $campaign_id = request()->campaignId;

        try {
            $campaign = $campaign->where('id', $campaign_id)->delete();
            $this->deleteManagementTrendsHistories($campaign_id);

            return response([
                "status" => 200,
                "message" => "successfull",
                "data" => $campaign_id
            ],
                200
            );
        } catch (Exception $e) {
            return response([
                "status" => 500,
                "message" => "failed to delete trends campaign " . $e,
            ], 500);
        }
    }

    function deleteSummaryScheduler($user_details_id)
    {
        $campaign = new Scheduler;

        try {
            $campaign = $campaign->where('user_details_id', $user_details_id)->delete();

        } catch (Exception $e) {
            return response([
                "status" => 500,
                "message" => "failed to delete summary scheduler " . $e->getMessage(),
            ], 500);
        }
    }

    function deleteSummaryHistories($user_details_id)
    {
        $campaign = new SummaryHistory;

        try {
            $campaign = $campaign->where('user_details_id', $user_details_id)->delete();

        } catch (Exception $e) {
            return response([
                "status" => 500,
                "message" => "failed to delete summary histories " . $e->getMessage(),
            ], 500);
        }
    }

    function deleteManagementTrendsHistories($user_details_id)
    {   
        $campaign = new ManagementReportingHistory;

        try {
            $campaign = $campaign->where('user_details_id', $user_details_id)->delete();

        } catch (Exception $e) {
            return response([
                "status" => 500,
                "message" => "failed to delete trend histories " . $e->getMessage(),
            ], 500);
        }
    }

    function deleteManagementProfilingHistories($user_details_id)
    {
        $campaign = new ManagementProfilingHistory;

        try {
            $campaign = $campaign->where('user_details_id', $user_details_id)->delete();

        } catch (Exception $e) {
            return response([
                "status" => 500,
                "message" => "failed to delete influencer management histories " . $e->getMessage(),
            ], 500);
        }
    }
}
