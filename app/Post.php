<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function classname()
    {
    	return $this->belongsTo('App\Classname');
    }

    public function member()
    {
    	return $this->hasMany('App\Member');
    }

    public function videostatusverify()
    {
    	return $this->belongsTo('App\VideoStatusVerify');
    }

    public function assignment()
    {
    	return $this->belongsTo('App\Assignment');
    }


}
