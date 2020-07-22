<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ReportingHistory;

class ManagementReportingController extends Controller
{
    //

    function index() {
        $id = request()->id;

        return view('managements.showReport')->withId($id)->with('is_reporting', true);
    }
    
    function profile() {
        $id = request()->id;

        return view('managements.showReport')->withId($id);
    }
    
    function profilingSummary() {
        $id = request()->id;

        return view('managements.showReport')->withId($id)->with('summary', true);
    }
}
