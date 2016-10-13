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
            $data = $request->user()->workshares()->orderBy('id','desc')->get();
        }
        else{
            $data = Workshare::where('user_id',$request->user()->id)->orderBy('id','desc')->get();
            foreach($data as $workshare)
            {
                $workshare->userCountAttribute();
            }
        }
        return view('share.index',['shareList'  =>  $data, 'mode' => $mode]);
    }

    public function writeView()
    {
        return view('share.write');
    }
    public function writeInsert(Request $request)
    {
        $selectUserId = explode(",", $request->selectUser);
        $insertData = Workshare::create([
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
            Shareuser::create([
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
    public function GroupGetUserName(Devision $division, Request $request)
    {
        $userData = $division->users()->where('id','!=',$request->user()->id)->get();
        echo $userData;
    }
    public function detailView(Workshare $workshare,Request $request)
    {   
        $getWork = $workshare->where('id',$workshare->id)->get();
        $orderId = $getWork->implode('user_id');
        $check = $workshare->SendConfirm()->where('user_id',$request->user()->id)->get();
        if($check->isEmpty() && $orderId != $request->user()->id)
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
}
