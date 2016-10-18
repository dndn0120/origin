<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','division','position',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function workings()
    { 
    	return $this->hasMany('App\Working');
    }
    public function workshares()
    {
        return $this->belongsToMany('App\Workshare','shares_user','userid','sid');
    }
    public function divisions()
    {
        return $this->belongsTo('App\Devision');
    }
    public function test()
    {
        echo 1234;
    }

}
