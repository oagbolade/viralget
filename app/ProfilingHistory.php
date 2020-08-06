<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilingHistory extends Model
{
    //
    protected $guarded = [];

    public function plan() {
        return $this->belongsTo(Plans::class, 'package', 'id');
    }

    public function subscriptionUsage()
    {
        return $this->hasMany(Subscription::class, 'user_id', 'user_id');
    }

}
