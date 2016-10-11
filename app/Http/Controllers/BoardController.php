<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Working;

class BoardController extends Controller
{
    protected $tasks;
    //
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Working $board)
    {
        //
        $sessionv = $request->session()->get('secret');
        print_r($sessionv);
        $dataList = $board->orderBy('id','desc')->paginate(10);
        return view('tasks.index',['tasks' => $dataList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tasks.write');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Working $board)
    {
        $board->create([
            'name'	    =>	$request->name,
            'contents'	=>	$request->contents,
            'user_id'   =>  $request->user()->id,
            'secret'    =>  $request->secret,
            'password'  =>  $request->secret_pass,
            
        ]);
    	return redirect('/board');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Working $board)
    {
        //
        $viewdata = $board->find(1);
        $viewdata = $board->where('id',$board->id)->first();
        if($viewdata->secret == 1)
        {
            $access_board_id = $request->session()->get('secret');
            if(!$access_board_id)
            {
                return redirect('/passconfirm/'.$board->id);
            }
            $access = array_search($board->id,$access_board_id);
            if($access === false)
            {
                return redirect('/passconfirm/'.$board->id);
            }
        }
        return view('tasks.Tview', [
            'task'	=>  $viewdata
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Working $board)
    {
        //
        $data = $board->where('id',$board->id)
                        ->get();
        return view('tasks.modify', [
            'tasks'	=>  $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Working $board,Request $request)
    {
        $this->authorize('update',$board);
        $board->where('id',$board->id)
                ->update(['name' => $request->name, 'contents' => $request->contents]);
        return redirect('/board');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Working $board)
    {
        $this->authorize('destroy',$board);
        $board->delete();
        return redirect('/board');
    }
    public function confirm_page(Request $request,Working $board)
    {
        return view('tasks.passconfirm',['tasks' =>  $request->id]);
    }
    public function validation(Request $request, Working $board)
    {
        $data = $board->find(1);
        $data = $board->where('id',$request->id)->first();
        if($data->password == $request->password)
        {
           $request->session()->push('secret',$request->id);
           return redirect('/board/'.$request->id);
        }
        else
        {
            return redirect('/passconfirm/'.$request->id);
        }
    }
}
