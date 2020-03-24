<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProject extends Model
{
    protected $guarded = [];
    
    public function project()
    {
    return $this->hasMany('App\Project');
    }
}
