<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shareuser extends Model
{
    //
    protected $table = 'shares_user';
    protected $fillable = ['sid', 'userid'];
    public function workshares()
    {
        return $this->hasMany('App\Workshare','uer_id');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
