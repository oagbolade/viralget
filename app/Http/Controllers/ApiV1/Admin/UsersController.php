<?php

namespace App\Http\Controllers\ApiV1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscription;
use Exception;

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
}
