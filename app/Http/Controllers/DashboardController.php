<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Plans;
use App\Subscription;
use App\ReportingHistory;
use App\ProfilingHistory;


class DashboardController extends Controller
{
    //

    public function index() {
        $user = Auth()->user();

        $subscription = Subscription::where('user_id', $user->id)->first();
        $profiling = ProfilingHistory::where('user_id', $user->id)->latest()->take(5)->get();
        $reporting = ReportingHistory::where('user_id', $user->id)->latest()->take(5)->get();

        if(!$user->subscription) {
            return redirect(route('pricing'));
        }
                
        return view('pages.dashboard')
                ->withIsDarkBg(true)
                ->withUser($user)
                ->withSubscription($subscription)
                ->withReporting($reporting)
                ->withProfiling($profiling);
    }


    public function profiling() {
        $user = Auth()->user();

        $subscription = Subscription::where('user_id', $user->id)->first();
        $profiling = ProfilingHistory::where('user_id', $user->id)->latest()->paginate(20);
                
        return view('pages.profiling')
                ->withIsDarkBg(true)
                ->withUser($user)
                ->withSubscription($subscription)
                ->withProfiling($profiling);
    }

    public function reporting() {
        $user = Auth()->user();

        $subscription = Subscription::where('user_id', $user->id)->first();
        $reporting = ReportingHistory::where('user_id', $user->id)->latest()->paginate(20);
        
        if(!$subscription) return redirect('pricing')->withError('Please subscribe to a plan to continue');
        
        return view('pages.reporting')
                ->withIsDarkBg(true)
                ->withUser($user)
                ->withSubscription($subscription)
                ->withReporting($reporting);
    }

}
