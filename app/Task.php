<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['name','contents'];
    public function user()
    {
    	$this->belongsTo(User::class);
    }
}
