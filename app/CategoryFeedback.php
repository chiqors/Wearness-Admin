<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryFeedback extends Model
{
    public $guarded = [];

    public function feedback()
    {
    return $this->hasMany('App\Feedback');
    }
}
