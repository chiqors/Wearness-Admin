<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventInstructor extends Model
{
    protected $guarded = [];
    
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function instructor()
    {
        return $this->belongsTo('App\Instructor');
    }
}
