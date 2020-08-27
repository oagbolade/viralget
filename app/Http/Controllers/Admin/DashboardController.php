<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('administrator.dashboard.home');
    }
    
    public function userSubscription()
    {
        return view('administrator.dashboard.subscription');
    }
}
