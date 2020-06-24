<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\ProfilingHistory;

class CampaignController extends Controller
{
    function index()
    {
        return view('campaigns.view');
    }
   
    function create()
    {
        return view('campaigns.create');
    }
}
