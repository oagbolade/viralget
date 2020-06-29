<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilingCampaigns extends Model
{
    protected $fillable = ['handle', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
