<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classname extends Model
{
    public function member()
    {
    	return $this->hasMany('App\Member');
    }

    public function post()
    {
    	return $this->hasMany('App\Post');
    }
    
}
