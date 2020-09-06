<?php

namespace App\Http\Controllers\ApiV1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscription;
use App\User;
use App\TrafficData;
use Exception;
// use Carbon;
use Carbon\Carbon as Carbon;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => ['login']]);
    }

    public function getSubscriptions()
    {
        try {
            $subscription = Subscription::with('users', 'plan')->get();
        } catch (Exception $e) {
            return response([
                'status' => 500,
                'message' => 'An error occured ' . $e,
            ], 500);
        }

        return response([
            'status' => 200,
            'data' => $subscription,
        ], 200);
    }

    public function getAllTrafficData()
    {
        // Get online users
        $now = Carbon::now();
        $current_month = $now->month;
        $current_year = $now->year;

        try {
            $users = User::all();
            $traffic_data = new TrafficData;
            $monthly_visits = $traffic_data::where(['month' => $current_month, 'year' => $current_year])->get();
            $all_time_visits = $traffic_data::all();
        } catch (Exception $e) {
            return response([
                'status' => 500,
                'message' => 'An error occured ' . $e,
            ], 500);
        }

        return response([
            'status' => 200,
            'user_count' => count($users),
            'monthly_visits' => count($monthly_visits),
            'all_time_visits' => $all_time_visits,
        ], 200);
    }
}
