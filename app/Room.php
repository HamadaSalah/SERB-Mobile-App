<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];
    public function order() {
        return $this->belongsTo('App\Order', 'order_id','id');
    }
    public function user() {
        return $this->belongsTo('App\User', 'user_id','id');
    }
    public function driver() {
        return $this->belongsTo('App\Driver', 'driver_id','id');
    }
}
