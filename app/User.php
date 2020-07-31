<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    public function member()
    {
        return $this->hasMany('App\Member');
    }

    public function assignment()
    {
        return $this->hasMany('App\Assignment');
    }

    public function videostatusverify()
    {
        return $this->hasMany('App\VideoStatusVerify');
    }

    public function picture()
    {
    	return $this->hasMany('App\Picture');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function message()
    {
        return $this->belongsTo('App\Message');
    }
}
