<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')

<form action="{{ url('/board') }}" method="POST" class="form-horizontal">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="task-name" class="col-sm-3 control-label">비밀번호</label>
		<div class="col-sm-6">
		<input type="checkbox" name="secret" value="1"> 비밀글
			<input type="password" name="secret_pass" id="task-name" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="task-name" class="col-sm-3 control-label">제목</label>
		<div class="col-sm-6">
			<input type="text" name="name" id="task-name" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="task-name" class="col-sm-3 control-label">내용</label>
		<div class="col-sm-8 row-sm-10">
			<input type="text" name="contents" id="task-contents" cols="2" class="form-control" rows="20">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-6">
			<button type="submit" class="btn btn-default">
				<i class="fa fa-plus"></i> 작성하기
			</button>
		</div>
	</div>
</form>
@endsection
    