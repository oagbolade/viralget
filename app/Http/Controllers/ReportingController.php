<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ReportingHistory;

class ReportingController extends Controller
{
    //

    function index() {
        $id = request()->id;

        return view('profiles.showReport')->withId($id)->with('is_reporting', true);
    }
}
