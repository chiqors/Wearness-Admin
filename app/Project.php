<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categoryProject()
    {
        return $this->belongsTo('App\CategoryProject');
    }
}
