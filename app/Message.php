<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    public function reciever() 
    {
        return $this->belongsTo('App\User', 'reciever_id','id');
    }

    public function sender() 
    {
        return $this->belongsTo('App\User', 'user_id','id');
    }
}