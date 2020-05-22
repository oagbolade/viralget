<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TwitterFetch;

class ScrapperController extends Controller
{
    //
    function index() {
        $username = request()->handle;
                
        $twitter = new TwitterFetch($username);
        // $twitter->getUserProfile();    

        print_r($twitter->getName());
    }

}
