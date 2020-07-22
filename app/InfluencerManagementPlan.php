<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfluencerManagementPlan extends Model
{
    //
    public $table = 'influencer_management_plans';

    public function getCurrencyAmountAttribute()
    {
        return env('CURRENCY') . number_format($this->price, 2);
    }
}
