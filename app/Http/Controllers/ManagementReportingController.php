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
}
