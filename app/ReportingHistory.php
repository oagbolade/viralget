<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProfilingHistory;
use App\Subscription;

class ReportingHistory extends Model
{
    protected $guarded = [];

    public function plan() {
        return $this->belongsTo(Plans::class, 'package', 'id');
    }

    public function profilingHistory()
    {
        return $this->hasMany(ProfilingHistory::class, 'user_id', 'user_id')->orderBy('id', 'desc');
    }

    public function subscriptionUsage()
    {
        return $this->hasMany(Subscription::class, 'user_id', 'user_id');
    }

}
