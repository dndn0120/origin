<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    protected $tasks;
    //
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }
    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    } 
    public function store(Request $request)
    {
        
        $this->validate($request, [
                'name' => 'required|max:255',
    	]);
    	
            $request->user()->tasks()->create(array(
                'name'	    =>	$request->name,
                'contents'	=>	$request->contents,
        ));

    	return redirect('/tasks');
    }
    function alert($msg)
    {
        echo "
			<script type='text/javascript' language='javascript'>
					alert('".$msg."');
				history.go(-1);
			</script>
		";
    }
    public function destroy(Request $request, Task $task)
    {
        
        if($request->id !== $task->user_id)
        {
            $this->alert('권한이 없습니다.');
        }
        else 
       {
            $this->authorize('destroy', $task);
            $task->delete();
            return redirect('/tasks');
       }
    }
    public function view(Request $request,$idx)
    {
        return view('tasks.Tview', [
        'tasks'	=>  $this->tasks->Boardview($idx),
    ]);
    }
    public function write()
    {
    	return view('tasks.write');
    }
    public function modify()
    {
        return view();
    }
}
