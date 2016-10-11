<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devision extends Model
{
    //
    protected $table = 'division_name';
    public function users()
    {
        return $this->hasMany('App\User','division','div_num');
    }
}
