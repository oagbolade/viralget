<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
