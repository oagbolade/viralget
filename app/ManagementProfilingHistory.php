<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\InfluencerManagementPlan;

class ManagementProfilingHistory extends Model
{
    //
    protected $guarded = [];
    protected $table = 'management_profiling_histories';

    public function plan() {
        return $this->belongsTo(InfluencerManagementPlan::class, 'package', 'id');
    }

}
