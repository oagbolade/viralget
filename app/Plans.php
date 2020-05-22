<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    //
    public $table = 'subscription_plans';

    public function getCurrencyAmountAttribute() {
        return env('CURRENCY').number_format($this->amount, 2);
    }

}
