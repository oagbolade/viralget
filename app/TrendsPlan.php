<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrendsPlan extends Model
{
    //
    public $table = 'trend_plans';

    public function getCurrencyAmountAttribute() {
        return env('CURRENCY').number_format($this->price, 2);
    }

}
