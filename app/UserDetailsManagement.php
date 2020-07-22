<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TrendsPlan;
use App\InfluencerManagementPlan;

class UserDetailsManagement extends Model
{
    //
    protected $guarded = [];
    protected $table = 'user_details_management';

    public function trendsPlan()
    {
        return $this->hasOne(TrendsPlan::class, 'id', 'plan_id');
    }
    
    public function influencerManagementPlan()
    {
        return $this->hasOne(InfluencerManagementPlan::class, 'id', 'plan_id');
    }
}
