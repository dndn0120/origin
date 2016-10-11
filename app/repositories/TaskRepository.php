<?php

namespace App\Repositories;

use DB;
use App\User;

class TaskRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    /*
    public function test(DB $DB)
    {
        $param = DB::table('tasks')
            ->join('users', 'user_id','=','users.name')
            ->orderBy('created_at','desc')
            ->select('tasks.*','users.name')
            ->get();
        return $param;
    }
    */
    public function forUser()
    {
        $list = DB::table('tasks')
            ->join('users', 'user_id','=','users.id')
            ->orderBy('created_at', 'desc')
            ->select('tasks.*','users.name as id_name')
            ->get();
        return $list;
    }

    public function Boardview($idx)
    {
    	$Boardview = DB::table('tasks')
    	       ->select('tasks.*')
    	       ->where('id',$idx)
    	       ->get();
    	return $Boardview;
    }
    public function update($request,$id)
    {
        DB::table('tasks')
        ->where('id','=',$id)
        ->update(['name'=>$request->name,'contents'=>$request->contents]);
    }
    public function del($id)
    {
        DB::table('tasks')->where('id', '=', $id)->delete();
    }
}