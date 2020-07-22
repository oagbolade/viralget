<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\InfluencerManagementPlan;

class SummaryHistory extends Model
{
    //
    protected $guarded = [];
    protected $table = 'summary_histories';

    public function plan() {
        return $this->belongsTo(InfluencerManagementPlan::class, 'package', 'id');
    }

}
