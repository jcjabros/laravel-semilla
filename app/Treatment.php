<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    public function duration_prices()
    {
        return $this->hasMany('App\DurationPrice');
    }
}
