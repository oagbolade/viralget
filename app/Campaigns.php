<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{
    protected $fillable = ['keywords', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
