<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\ApiV1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Subscription;
use App\ReportingHistory;
use App\ProfilingHistory;
use Exception;

class ReportingHistoryController extends Controller
{
    protected function authenticate()
    {
        $auth_data = explode(' ', request()->header('Authorization'));
        $token = $auth_data[1];
        $user = User::where('api_token', $token)->first();

        return $user;
    }

    function getReportingHistory()
    {
        $user = $this->authenticate();

        if (!$user) return response(['status' => 401, 'message' => 'Unauthorized user']);

        $subscription = Subscription::where('user_id', $user->id)->with('plan')->get();
        $profiling = ProfilingHistory::where('user_id', $user->id)->latest()->take(5)->with('plan')->get();
        $reporting = ReportingHistory::where('user_id', $user->id)->latest()->take(5)->with('plan')->get();
        
        if(!$user->subscription) {
            return response(['status' => 403, 'message' => 'user not subscribed to a pricing plan']);
        }

        return response([
            "status" => 200,
            "message" => "successful",
            "data" => [
                'user' => $user,
                'subscription' => $subscription,
                'profiling' => $profiling,
                'reporting' => $reporting,
            ]
        ], 200);
    }
}
