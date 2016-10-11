<!-- resources/views/tasks/index.blade.php -->
@extends('layouts.app')
@section('content')
	<table class="type01">
		<tr>
			<td>
				<a href="{{ url('/shareindex/receiver')}}">받은 업무공유 내역</a>
			</td>
			<td>
				<a href="{{ url('/shareindex/send')}}">보낸 업무공유 내역</a>
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
    		@foreach($shareList as $share)
        		<tr>
        			<td>0</td>
        			<td>
        				<a href="{{ url('/detailView/'.$share->id) }}">{{$share->subject}}</a> 
        				@if($share->important_level = 1)
        					<font size='3' color='red'>*</font>
        				@endif
        			</td>
        			<td>{{$share->user_name}}</td>
        			<td>{{$share->created_at}}</td>
	        		@if($mode == 'send')
        				<td>{{$share->total}}/{{$share->uses}}</td>
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
