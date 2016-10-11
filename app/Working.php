<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;

class Working extends Model
{
    //
    protected $table = 'tasks';
    //protected $connection = 'users';
    protected $fillable = ['name', 'contents','user_id','secret','password'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
