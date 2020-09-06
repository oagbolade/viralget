<?php

namespace App\Http\Controllers\ApiV1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscription;
use Exception;

class ChartController extends Controller
{
    public function lineChart()
    {
        return 'hello';
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
}
