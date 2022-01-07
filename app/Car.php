<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];
    public function driver()
    {
        return $this->belongsTo('App\Driver');
    }
}
