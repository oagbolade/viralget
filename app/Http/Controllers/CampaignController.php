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
   
    function create()
    {
        return view('campaigns.create');
    }
}
