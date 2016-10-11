<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')
    <table align="center">
        	<form action="{{ url('/validation') }}" method="POST" class="form-horizontal">
        	    	{{ csrf_field() }}
                <tr>
                	<td>
                		비밀번호 : 
                	</td>
                	<td>
                	
                		<input type="hidden" name="id" value="{{$tasks}}">
                		<input type="password" name="password" id="task-name" class="form-control">
                	</td>
                </tr>
                <tr>
                	<td>
                		<button type="submit" class="btn btn-default">확인</button>
                	</td>
                </tr>
            </form>
    </table>
@endsection