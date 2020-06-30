<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HashtagCampaigns extends Model
{
    protected $fillable = ['keywords', 'user_id'];
    protected $table = 'hashtag_campaigns';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
