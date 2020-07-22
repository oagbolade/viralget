<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TrendsPlan;

class ManagementReportingHistory extends Model
{
    //
    protected $guarded = [];
    protected $table = 'management_reporting_histories';

    public function plan() {
        return $this->belongsTo(TrendsPlan::class, 'package', 'id');
    }

}
