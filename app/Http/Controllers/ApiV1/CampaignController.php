<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\ApiV1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Campaigns;
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

        if (!$user) return response(['status' => 'error', 'message' => 'Unauthorized user']);
        $campaigns = new Campaigns;

        try {
            // Add pagination
            $campaigns = $campaigns::where('user_id', $user->id)->get();

            if (count($campaigns) > 0) {
                return response([
                    "status" => 200,
                    "message" => "successfull",
                    "data" => $campaigns
                ], 200);
            }

            return response([
                "status" => 204,
                "message" => "no campaigns found for this user",
                "data" => []
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
        $user = $this->authenticate();

        if (!$user) return response(['status' => 'error', 'message' => 'Unauthorized user']);

        $keywords = request()->keywords;
        $description = request()->description;
        $user_id = $user->id;

        $campaign = new Campaigns;

        $campaign->keywords = $keywords;
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

    function delete()
    {
        $campaign_id = request()->campaignId;
        $campaign = new Campaigns();

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
