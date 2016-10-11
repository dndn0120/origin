<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <form action="{{ url('/board/create') }}" method="get">
            {{ csrf_field() }}
        	<button type="submit" class="btn btn-danger">write</button>
        </form>
        @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div>
                <table class="table table-striped task-table" align="center">
                    <thead>
                        <th>게시물</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody align="center">
                    <th align="center">번호</th>
                    <th align="center">제목</th>
                    <th align="center">글쓴이</th>
                    <th align="center">작성일</th>
                    <!-- {{$i = count($tasks)}} -->
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td>
                                	{{$i--}}
                                </td>
                                <td>
                                
                                    <div>

                                        	<a href="{{ url('/board/'.$task->id) }}">{{ $task->name }}</a>
                                    	@if($task->secret != 0)
                                    		<img src="../../image/lock.PNG" width="17" height="15">
                                    	@endif
                                    </div>
                                </td>
                                
                                 <td>
                                    <div>{{ $task->user->name }}</a></div>
                                </td>
                                 <td>
                                    <div>{{ $task->created_at }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$tasks->links()}}
            </div>
        </div>
    @endif
@endsection
<script type="text/javascript">

function button_event(){
	 var popupOption = 'directories=no, toolbar=no, location=no, menubar=no, status=no, scrollbars=no, resizable=no, left=400, top=200, width=440, height=550';
	window.open('',popupOption);
}
</script>