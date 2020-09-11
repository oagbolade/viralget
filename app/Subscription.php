<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //
    public $table = 'subscriptions';
    protected $guarded = [];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(UserDetails::class, 'user_id', 'user_id');
    }
    
    public function initialUsers()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function plan() {
        return $this->hasOne(Plans::class, 'id', 'plan_id');
    }
}
