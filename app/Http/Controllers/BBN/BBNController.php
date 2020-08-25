<?php

namespace App\Http\Controllers\BBN;

use Illuminate\Http\Request;

class BBNController
{
    public function showReport()
    {
        return view('bbn.BBNReport');
    }
}
