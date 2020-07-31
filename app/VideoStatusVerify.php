<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoStatusVerify extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function post()
    {
    	return $this->belongsTo('App\Post');
    }
}
