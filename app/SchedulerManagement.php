<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchedulerManagement extends Model
{
    protected $fillable = ['user_id', 'user_details_id', 'last_refresh'];

    protected $table = 'management_scheduler';
}
