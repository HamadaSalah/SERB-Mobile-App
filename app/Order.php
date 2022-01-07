<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function driver()
    {
        return $this->belongsTo('App\Driver', 'driver_id', 'id');
    }
    protected $casts = [
        'img' => 'array'
    ];


}
