<!-- resources/views/tasks/index.blade.php -->
		<meta name="csrf-token" content="{{ csrf_token() }}" />
@extends('layouts.app')
@section('content')
	<form action="{{ url('/sharePrc') }}" method="post" name="shareForm" enctype="multipart/form-data">
		
		<input type="hidden" name="selectUser" id="Users" value="">
    	<table class="type02">
    		<tr>
    			<th>업무요약</th>
    			<td><input type="text" class="intext" name="subject" id="sub"></td> 
    		</tr>
    		<tr>
    			<th>수신</th><td><p id="selectUser"></p><input type="button" value="찾기" onclick="openPop()"></td>
    		</tr>
    		<tr>
    			<th>파일첨부</th><td><input type="file" name="filename" value="첨부하기"></td>
    		</tr>	
    	</table>
    	<table class="type03">
        	<tr>
        		<td><textarea class="texa01" id="content" name="content"></textarea></td>
        	</tr>
    	</table>
    	<table align="center">
    		<tr>
    			<td>
                	{{ csrf_field() }}
            		<button type="submit" class="btn btn-danger">write</button>
            	</td>
		</table>
	</form>
	@endsection 
	
<script type="text/javascript">
	//수신할 계정을 선택하는 팝업창을 띄우는 function
	function openPop()
	{
		var newWindow;
		newWindow = window.open('/AddUserForm','target_name','scrollbars=yes,toolbar=yes,resizable=yes,width=1100,height=700,left=0,top=0');
	}
	//divisionTree.php에서 생성한 데이터를 받아오는 부분
	function receiver_data(userObj)
	{
		var userName = new Array();
		var postUser = new Array();
		$.each(userObj, function(i,v){
			userName.push("<a href=''>"+v+"</a>");
			//서버단에 보낼 데이터를 저장
			postUser.push(i);
			
		});
		var nameString ="<font size=''2>"+userName.join("||")+"</font>";
		$("#selectUser").html(nameString);
		//id값이 Users인 태그의 value를 set
		$("#Users").attr('value',postUser);
	}
</script>
