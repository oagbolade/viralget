<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    //

    public function account() {
        return $this->belongsTo(Account::class);
    }
}
