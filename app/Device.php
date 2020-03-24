<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $guarded = [];

    public function sales()
    {
    return $this->hasOne('App\Sales');
    }

    public function user()
    {
    return $this->belongsTo('App\User', 'user_id');
    }
}
