<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scheduler extends Model
{
    protected $fillable = ['user_id', 'user_details_id', 'last_refresh'];

    protected $table = 'summary_scheduler';
}
