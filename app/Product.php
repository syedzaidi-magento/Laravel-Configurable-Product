<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $fillable = ['name', 'sku', 'price', 'leg_id', 'legable_id', 'legable_type'];
    use SoftDeletes;

    public function legs()
    {
        return $this->morphToMany('App\Leg', 'legable');
    }
}
