<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Devision;
use App\Workshare;
use App\Shareuser;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\DB;
use App\WorkShareReadCheck;

class ShareController extends Controller
{
    //
    public function __construct()
    {
    }
    public function index(Request $request,$mode='receiver')
    {
        if($mode == 'receiver'){
            $data = $request->user()->workshares()->select('workshare.*,count(shares_user.*)')->groupBy('workshare.id')->get();
        }
        else{
                
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            /*
            $data = DB::table('workshare as w')
                ->select(DB::raw('w.*,count(s.sid) as total, count(if(s.confirm=1,s.confirm,null)) as uses'))
                ->leftJoin('shares_user as s','w.id','=','s.sid')
                ->where('w.user_id',$request->user()->id)
                ->groupBy('w.id')->get();
            $shareuser = new Shareuser();
            $data = $shareuser->workshares()->select();
            */
        }
        return view('share.index',['shareList'  =>  $data, 'mode' => $mode]);
    }

    public function writeView()
    {
        return view('share.write');
    }
    public function writeInsert(Request $request)
    {
        $workshare = new Workshare;
        $shareuser = new Shareuser;
        $selectUserId = explode(",", $request->selectUser);
        $insertData = $workshare->create([
                        'subject'           => $request->subject,
                        'content'           => $request->content, 
                        'file_name'         => '0',
                        'user_name'         => $request->user()->name,
                        'user_id'           => $request->user()->id,
                        'important_level'   => "1"
                    ]);
        $arrayCount = count($selectUserId);
        for($i = 0; $i < $arrayCount; $i++)
        {
            $shareuser->create([
                'sid'       => $insertData->id,
                'userid'    => $selectUserId[$i],
                'confirm'   => 0
            ]);
        }
        //$request->file('filename')->move(public_path("/Filedata/"));
        return redirect('/shareindex');
    }

    public function divisionList(Devision $division)
    {
        $division = $division->orderBy('id','desc')->get();
        return view('share.divisionTree',['div_name' => $division]);
    }
    public function GroupGetUserName(Devision $division)
    {
        $userData = $division->users()->get();
        echo $userData;
    }
    public function detailView(Workshare $workshare,Request $request)
    {        
        $check = $workshare->SendConfirm()->where('user_id',$request->user()->id)->get();
        if($check->isEmpty())
        {
            $workshare->SendConfirm()->create([
                'user_id'   =>  $request->user()->id
            ]);
        }
        $data = $workshare->getUser()->get();
        return view('share.view',['workdata' => $workshare, 'viewData' => $data]);
        
    }
    public function fileDown($name)
    {
        echo $name;
    }
    /*
     public function UserList(User $user,$id)
     {
     $userList = $user->where('division',$id)->orderBy('id','desc')->get();
     return view('share.findUser',['users' => $userList]);
     }
     */
}
