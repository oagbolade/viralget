<?php

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller;
use App\TrafficData;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TrafficDataController extends Controller
{
    function saveTrafficData(Request $request)
    {
        $now = Carbon::now();

        $ip_address = $request->ip_address;
        $city = $request->city;
        $country = $request->country;
        $timezone = $request->timezone;
        $last_page_visited = $request->last_page_visited;

        try {
            TrafficData::updateOrCreate(
                ['ip_address' => $ip_address],
                [
                    'country' => $country,
                    'city' => $city,
                    'timezone' => $timezone,
                    'month' => $now->month,
                    'year' => $now->year,
                    'timestamp' => $now->timestamp,
                    'last_page_visited' => $last_page_visited,
                ]
            );

            response(
                [
                    'status' => 200,
                    'message' => 'Traffic data saved successfully',
                ],
                200
            );
        } catch (\Exception $e) {

            response([
                'status' => 500,
                'message' => 'An error occured ' . $e,
            ], 500);
        }
    }
}
