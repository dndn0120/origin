<!-- resources/views/tasks/index.blade.php -->
@extends('layouts.app')
@section('content')
	<table class="type01">
		<tr>
			<td>
				<a href="{{ url('/shareindex/receiver')}}">업무공유수신내역</a>
			</td>
			<td>
				<a href="{{ url('/shareindex/send')}}">업무공유발신내역</a>
			</td>
			<td>
				<a href="{{ url('/shareindex/send')}}">임시저장</a>
			</td>
		</tr>
	</table>
	<table class="type01">
    	<thead>
    		<tr>
        		<th>번호</th>
        		<th>제목</th>
        		<th>작성자</th>
        		<th>날짜</th>
        		@if($mode == 'send')
        			<th>회신인원</th>
        		@endif
    		</tr>
    	</thead>
    	<tbody>
    		@foreach($shareList as $list)
    			<tr>
    				<td>1</td>
    				<td><a href="{{ url('/detailView/'.$list->id) }}">{{$list->subject}}</a></td>
    				<td>{{$list->user_name}}</td>
    				<td>{{$list->created_at}}</td>
    				@if($mode == 'send')

    					<td>{{$list->confirm_user}}/{{$list->total_user}}</td>
    				@endif
    			</tr>
    		@endforeach
		</tbody>
	</table>
    <form action="{{ url('/write') }}" method="get">
        {{ csrf_field() }}
    	<button type="submit" class="btype01">등록</button>
    </form>
@endsection
