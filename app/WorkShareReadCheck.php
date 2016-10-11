<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkShareReadCheck extends Model
{
    //
    protected $fillable = ['user_id','s_id'];
    protected $table = 'workShareReadCheck';
    
}