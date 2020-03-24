<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    
    public function categoryFeedback()
    {
        return $this->belongsTo('App\CategoryFeedback', 'category_feedback_id');
    }
}
