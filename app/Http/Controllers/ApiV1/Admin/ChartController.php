<?php

namespace App\Http\Controllers\ApiV1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscription;
use App\TrafficData;
use Exception;
use Illuminate\Support\Carbon;

class ChartController extends Controller
{
    public function lineChart()
    {
        $carbon = Carbon::now();
        $year = $carbon->year;

        try {
            $visits = TrafficData::where(['year' => $year])->get();
        } catch (Exception $e) {
            return response([
                'status' => 500,
                'message' => 'An error occured ' . $e,
            ], 500);
        }

        return response([
            'status' => 200,
            'data' => $visits,
        ], 200);
    }
    
    public function filterLineChart()
    {
        dd(request()->hours);
        $carbon = Carbon::now();
        $year = $carbon->year;

        try {
            $visits = TrafficData::where(['year' => $year])->get();
        } catch (Exception $e) {
            return response([
                'status' => 500,
                'message' => 'An error occured ' . $e,
            ], 500);
        }

        return response([
            'status' => 200,
            'data' => $visits,
        ], 200);
    }
}
