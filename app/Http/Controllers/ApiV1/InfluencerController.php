<?php

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller;
use App\Influencers;
use App\Category;
use App\User;


use Exception;

class InfluencerController extends Controller
{

    protected function authenticate()
    {
        $auth_data = explode(' ', request()->header('Authorization'));
        $token = $auth_data[1];
        $user = User::where('api_token', $token)->first();

        return $user;
    }

    function getAllInfluencers()
    {
        $category_name = request()->category;
        $category_id = Category::where(['slug' => $category_name])->first();

        $user = $this->authenticate();

        if (!$user) return response(['status' => 'error', 'message' => 'Unauthorized user']);

        try {
            $influencers = Influencers::with('category')->where('category_id', $category_id->id)->paginate(15);

            if (count($influencers) > 0) {
                return response()->json([
                    'message' => "success",
                    'data' => $influencers,
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => "An error occured " . $e,
            ], 500);
        }
    }
}
