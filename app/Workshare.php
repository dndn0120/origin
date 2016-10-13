<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshare extends Model
{
    //
    protected $fillable = ['subject', 'content','file_name','user_name','user_id','important_level'];
    protected $table = 'workshare';
    protected $attributes = array('total_user' => 0,'confirm_user' => 0);
    

   public function users()
   {
       return $this->belongsToMany('App\User');
   }
   public function getUser()
   {
       return $this->belongsToMany('App\User','shares_user','sid','userid');
   }
   public function divisions()
   {
       return $this->hasMany('App\devision','sid');
   }
   public function SendConfirm()
   {
       return $this->hasMany('App\WorkShareReadCheck','s_id','id');
   }
   public function shareUser()
   {
       return $this->hasMany('App\shareuser','sid','id');
   } 
   public function userCountAttribute()
   {
       $this->attributes['total_user'] = $this->shareUser()->count();
       $this->attributes['confirm_user'] = $this->SendConfirm()->count();
   }
}
