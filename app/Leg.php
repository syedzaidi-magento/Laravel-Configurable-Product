<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leg extends Model
{
    public function products()
    {
        return $this->morphedByMany('App\Product', 'legable');
    }
}
