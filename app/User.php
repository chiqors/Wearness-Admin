<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'level', 'verified'
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

    public function verifyUser()
    {
    return $this->hasOne('App\VerifyUser');
    }

    public function sales()
    {
    return $this->hasOne('App\Sales');
    }

    public function feedback()
    {
    return $this->hasOne('App\Feedback');
    }

    public function blog()
    {
        return $this->hasOne('App\Blog');
    } 

    public function device()
    {
        return $this->hasOne('App\Device');
    } 

    public function customer()
    {        
        return $this->hasOne('App\Customer');
    }
}
