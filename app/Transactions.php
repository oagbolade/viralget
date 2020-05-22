<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    //
    public $table = 'transactions';
    protected $guarded = [];
    public $timestamps = false;
}
