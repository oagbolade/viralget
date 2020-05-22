<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProfilingHistory;

class ProfilingController extends Controller
{
    function index() {
        $id = request()->id;

        return view('profiles.showReport')->withId($id);
    }}
