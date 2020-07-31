<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function classname()
    {
    	return $this->belongsTo('App\Classname');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function post()
    {
    	return $this->hasMany('App\Post');
    }
}

