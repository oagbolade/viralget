<?php

namespace App\Http\Controllers\BBN;

use Illuminate\Http\Request;

class BBNController
{
    public function showReport()
    {
        return view('bbn.BBNReport');
    }

    public function showProfiling()
    {
        return view('bbn.InfluencerProfiling.BBNInfluencerProfiling');
    }
}
