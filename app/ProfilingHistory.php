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

}
