<!-- resources/views/tasks/index.blade.php -->
<script  src="http://code.jquery.com/jquery-latest.min.js"></script>
<link rel="stylesheet" href="{{ URL::asset('css/public.css') }}">
<table >
	<tr>
		<td>
			<table class="share1">
				<tr>
					<th>
						부서명
					</th>
				</tr>
				@foreach ($div_name as $name)
					<tr>
						<td>
							<span onclick="getUser('{{$name->div_num}}')">{{$name->div_name}}</span><br>
						</td>
					</tr>
				@endforeach
			</table>
		</td>
		<td>
			<table class="share2">
				<tr>
					<td>
						<p id="UserList" class="share2"></p>
					</td>
				</tr>
			</table>
		</td>
		<td>
			<table>
				<tr>
					<td>
						<input type="button" value="추가" onclick="insertData()">
					</td>
				</tr>
				<tr>
					<td>
						<input type="button" value="제거" onclick="deleteData()">
					</td>
				</tr>
			</table>
		</td>
		<td>
			<table class="share3">
				<tr>
					<th>
						<input type="checkbox">보낸이(발신)
					</th>
				</tr>
				<tr>
					<td>
						<p id="finalSelectUser">보낸이(발신)</p>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<table align="center">
	<tr>
		<td>
    		<input type='button' value='선택하기' onclick='send()'>
    	</td>
</table>

<script type="text/javascript">
	//수신하고자 하는 계정의 배열
	var checkUserObj = new Object();
	//ajax 로부터 받아온 데이터를 받아옴;;
	
	function userList(data)
	{
		var formArr;
    	//폼을 생성
    	$.each(data, function(i,v){
    		formArr += "<tr><td><input type='checkbox' name='groupUserList' value='"+v.id+"/"+v.name+"'>"+v.name+"</td></tr>";
    	});
    	//폼을 붙임
    	$("#UserList").html(formArr);
	}
	
	var auserList = function(data){
    	//각 부서별 계정 리스트의 폼을 저장하는 배열
    	var formArr;
    	//폼을 생성
    	$.each(data, function(i,v){
    		formArr += "<tr><td><input type='checkbox' name='groupUserList' value='"+v.id+"/"+v.name+"'>"+v.name+"</td></tr>";
    	});
    	//폼을 붙임
    	$("#UserList").html(formArr);
	};
	//각 부서별 계정을 가져오기 위한 ajax통신
	function getUser(id)
	{

		$.ajax({
			type:"get",
			url: "/GroupUserName/"+id,
			dataType: "json",
			success: userList
		});
	} 
	//checkUserObj의 들어있는 계정을 체크박스를 통해 제거하는 function
	function deleteData()
	{
		//제거하고자 하는 계정의 Id값을 담는 배열
		var deleteId = new Array();
		//체크박스를 클릭하면 deleteId 배열에 set함
		$("input:checkbox[name='selectData']:checked").each(function(){ 
			deleteId.push($(this).val()); 
		});
		//deleteId배열에 set되어있는 값을 checkUserObj에서 삭제
		$.each(deleteId, function(i,v){
			delete checkUserObj[v];
		});
		drawHtml();
	}
	function insertData()
	{
		$("input:checkbox[name='groupUserList']:checked").each(function(){
			var data = $(this).val();
			var rdata = data.split("/");
			checkUserObj[rdata[0]] = rdata[1];
		});
		$('input[name=groupUserList]').attr('checked',false);
		drawHtml();
	}
	function drawHtml()
	{
		var form;
		$.each(checkUserObj,function(i,v){
			form += "<tr><td><input type='checkbox' name='selectData' value='"+i+"'>"+v+"</td></tr>";
		});
		$("#finalSelectUser").html(form);
	}
	//부모창으로 선택한 계정 객체를 보냄
	function send()
	{
		window.opener.receiver_data(checkUserObj);
		window.close();
	}
</script> 



