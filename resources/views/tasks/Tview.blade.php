<!-- resources/views/tasks/index.blade.php -->
@extends('layouts.app')
@section('content')
<tbody>
	<table align="center">
            <tr>
                <!-- Task Name -->
                <td class="table-text">
                    <div>제목 : {{ $task->name }}</a></div>
                </td>
            </tr>
            <tr>
                <!-- Task Name -->
                <td class="table-text">
                    <div>내용 : {{ $task->contents }}</a></div>
                </td>
            </tr>
            <tr>
            	<td> 
            		<form action="{{ url('/board/'.$task->id) }}" method="POST">
        				{{ csrf_field() }}
        				<input type="hidden" name="_method" value="DELETE">
        				<input type="hidden" name="id"	value="$task->id">
        				<button type="submit" class="btn btn-danger">
        					<i class="fa fa-btn fa-trash"></i>Delete
        				</button>
        			</form>
        		</td>
        		<td> 
        			<form action="{{ url('board') }}" method="get">
        				<button type="submit" class="btn btn-danger">Back</button>
        			</form>
        		</td>
        		<td> 
        			<form action="{{ url('/board/'.$task->id).'/edit' }}" method="GET">
            				<button type="submit" class="btn btn-danger">Modify</button>
            		</form>
        		</td>
        	</tr>
    </table>
</tbody>
@endsection
                    