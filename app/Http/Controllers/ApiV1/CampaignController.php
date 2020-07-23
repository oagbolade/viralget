<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\ApiV1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\ProfilingHistory;
use App\ReportingHistory;
use App\UserDetailsManagement;

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
                "message" => "failed to get management campaigns " . $e,
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
                "message" => "failed to get trends campaigns " . $e,
            ], 500);
        }
    }
    
    function view()
    {
        $user = $this->authenticate();
        $hashtag_campaigns = new ReportingHistory;
        
        $profiling_campaigns = new ProfilingHistory;

        if (!$user) return response(['status' => 'error', 'message' => 'Unauthorized user']);

        try {
            // Add pagination
            $hashtag_campaigns = $hashtag_campaigns::where('user_id', $user->id)->orderBy('id', 'desc')->get();
            $profiling_campaigns = $profiling_campaigns::where('user_id', $user->id)->orderBy('id', 'desc')->get();
            $subscription = Subscription::where('user_id', $user->id)->with('plan')->get();

            return response([
                "status" => 200,
                "message" => "successfull",
                "data" => $hashtag_campaigns,
                "profiling_data" => $profiling_campaigns,
                'subscription' => $subscription,
            ], 200);

        } catch (Exception $e) {
            return response([
                "status" => 500,
                "message" => "failed to get campaigns " . $e,
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

        $keywords = request()->keywords;
        $dates = json_encode(request()->dates);
        $description = request()->description;
        $user_id = $user->id;

        $campaign = new ReportingHistory;
        $subscription = Subscription::where('user_id', $user->id)->first();

        if($campaign::where(['query' => request()->keywords, 'user_id' => $user->id])->first()){
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

        try {
            $campaign->save();
        } catch (Exception $e) {
            return response([
                "message" => "failed to create new report" . $e,
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
                "message" => "failed to create new user profiling" . $e,
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
                "message" => "failed to delete campaign " . $e,
            ], 500);
        }
    }
    
    function deleteManagement()
    {
        $campaign = new UserDetailsManagement;

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
                "message" => "failed to delete campaign " . $e,
            ], 500);
        }
    }
}
