<?php

namespace App\Http\Controllers\BBN;

use Illuminate\Http\Request;

class BBNController
{
    public function showReport()
    {
        $user = Auth()->user();
        return view('bbn.BBNReport');
    }
}
