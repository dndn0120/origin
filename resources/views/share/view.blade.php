<!-- resources/views/tasks/index.blade.php -->
		<meta name="csrf-token" content="{{ csrf_token() }}" />
@extends('layouts.app')
@section('content')
    	<table class="type02">
    		<tr>
    			<th>제목 :</th>
    			<td>{{$workdata->subject}}</td>
    		</tr>
    		<tr>
    			<th>수신인 :</th>
    			<td>
    				@foreach($viewData as $data)
    					{{$data->name}}||
    				@endforeach
    			</td>
    		</tr>
    		<tr>
    			<th>상신자 :</th><td>{{$workdata->user_name}}</td>
    		</tr>
    		<tr>
    			<th>작성날짜 :</th><td>{{$workdata->updated_at}}</td>
    		</tr>
    		<tr>
    			<th>첨부파일 :</th><td><a href="{{ url('/fdown/'.$workdata->file_name) }}">{{$workdata->file_name}}</a></td>
    		</tr>
        </table>
        <table class="type03">
    		<tr>
    			<td>{{$workdata->content}}</td>
    		</tr>    
    	</table>
@endsection