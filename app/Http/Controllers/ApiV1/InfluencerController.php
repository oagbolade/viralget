<?php

namespace App\Http\Controllers\ApiV1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Influencers;
use App\Category;
use App\Keyword;
use App\States;
use App\User;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;


use App\Subscription;
use App\ReportingHistory;
use App\ProfilingHistory;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class InfluencerController extends Controller
{

    protected function authenticate()
    {
        $auth_data = explode(' ', request()->header('Authorization'));
        $token = $auth_data[1];
        $user = User::where('api_token', $token)->first();
        // $user = User::first();

        return $user;
    }

    function getAllInfluencers()
    {

        // $user = $this->authenticate();

        // if (!$user) return response(['status' => 'error', 'message' => 'Unauthorized user']);

        try {
            $influencers = Influencers::with('category')->get();
            if (count($influencers) > 0) {
                return response()->json([
                    'message' => "success",
                    'data' => $influencers
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => "An error occured " . $e,
            ], 500);
        }
    }
}
