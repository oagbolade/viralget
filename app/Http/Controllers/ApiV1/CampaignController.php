<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\ApiV1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\HashtagCampaigns;
use App\ProfilingCampaigns;
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

    function view()
    {
        $user = $this->authenticate();

        $hashtag_campaigns = new HashtagCampaigns;

        $profiling_campaigns = new ProfilingCampaigns;

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

        $campaign = new HashtagCampaigns;

        $campaign->keywords = $keywords;
        $campaign->dates = $dates;
        $campaign->description = $description;
        $campaign->user_id = $user_id;

        try {
            $campaign->save();
        } catch (Exception $e) {
            return response([
                "message" => "faileld to create new campaign" . $e,
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
        $dates = json_encode(request()->dates);
        $description = request()->description;
        $user_id = $user->id;

        $campaign = new ProfilingCampaigns;

        $campaign->handle = $handle;
        $campaign->dates = $dates;
        $campaign->description = $description;
        $campaign->user_id = $user_id;

        try {
            $campaign->save();
        } catch (Exception $e) {
            return response([
                "message" => "faileld to create new profiling campaign" . $e,
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
        $campaign = new HashtagCampaigns;

        if (isset(request()->handle)) {
            $campaign = new ProfilingCampaigns;
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
}
