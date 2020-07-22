<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class HomeController extends Controller
{
    function index() {

        // $connection = new TwitterOAuth(env('CONSUMER_KEY'), env('CONSUMER_SECRET'), env('ACCESS_TOKEN'), env('TOKEN_SECRET'));        
        // $trends = $connection->get("trends/place", ['id' => '23424908']);

        // if($trends[0]->trends) {
        //     $trends = $trends[0]->trends;
        // } else {
        //     $trends = [];
        // }
            $trends = [];

        return view('home')->withTrends($trends)->withIsDarkBg(true);
    }

    function about() {
        return view('pages.about');
    }

    function whatwedo() {
        return view('pages.what-we-do');
    }
    
    function team() {
        return view('pages.team');
    }

    function marketing() {
        return view('pages.marketing');
    }

    function contact() {
        return view('pages.contact');
    }


    function faqs() {
        return view('home');
        // Disabled faq page for now
        // return view('pages.faqs');
    }

    function terms() {
        return view('pages.terms');
    }

    function privacy() {
        return view('pages.privacy-policy');
    }

    function pricing() {
        $user = Auth()->user();
        return view('pages.pricing')->withUser($user);
    }
    
    function management() {
        $user = Auth()->user();
        return view('pricing.influencerManagement')->withUser($user);
    }
    
    function trends() {
        $user = Auth()->user();
        return view('pricing.trends')->withUser($user);
    }


}
