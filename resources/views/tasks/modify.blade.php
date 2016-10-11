<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')
@foreach ($tasks as $task)
    <form action="{{ url('/board/'.$task->id) }}" method="POST" class="form-horizontal">
    	<input type="hidden" name="_method" value="PUT">
    	{{ csrf_field() }}
    	<div class="form-group">
    		<label for="task-name" class="col-sm-3 control-label">제목</label>
    		<div class="col-sm-6">
    			<input type="text" name="name" id="task-name" class="form-control" value="{{$task->name}}">
    		</div>
    	</div>
    	<div class="form-group">
    		<label for="task-name" class="col-sm-3 control-label">내용</label>
    		<div class="col-sm-8 row-sm-10">
    			<input type="text" name="contents" id="task-contents" cols="2" class="form-control" rows="20" value="{{$task->contents}}">
    		</div>
    	</div>
    	<div class="form-group">
    		<div class="col-sm-offset-3 col-sm-6">
    			<button type="submit" class="btn btn-default">
    				<i class="fa fa-plus"></i> 수정하기
    			</button>
    		</div>
    	</div>
    </form>
@endforeach
@endsection
    