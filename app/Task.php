<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //안녕하세요하하하
    protected $fillable = ['name','contents'];
    public function user()
    {
    	$this->belongsTo(User::class);
    }
}
