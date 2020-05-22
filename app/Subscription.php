<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //
    public $table = 'subscriptions';
    protected $guarded = [];
    public $timestamps = false;

    public function plan() {
        return $this->hasOne(Plans::class, 'id', 'plan_id');
    }
}
