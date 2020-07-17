<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
    function index()
    {
        $user = Auth()->user();

        if(!$user->subscription){
            return redirect()->to('/pricing')->withErrors(['error' => 'Please select a pricing plan to continue']);
        }
        return view('campaigns.view');
    }
    
    function trends()
    {
        $user = Auth()->user();
        $isUserSubscribed = $user->managementDetails->where('booking_type', 'trends')->first();

        if(!$isUserSubscribed){
            return redirect()->to('/pricing/trends')->withErrors(['error' => 'Please select a plan to continue']);
        }
        
        return view('campaigns.trends');
    }
    
    function influencerManagement()
    {
        $user = Auth()->user();
        $isUserSubscribed = $user->managementDetails->where('booking_type', 'influencer_management')->first();

        if (!$isUserSubscribed) {
            return redirect()->to('/pricing/management')->withErrors(['error' => 'Please select a plan to continue']);
        }

        return view('campaigns.management');
    }
   
    function create()
    {
        return view('campaigns.create');
    }
}
