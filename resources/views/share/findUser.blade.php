<!-- resources/views/tasks/index.blade.php -->


<form name="test">
	@foreach ($users as $user)
		{{$user->name}} <input type="checkbox" name="kang" value='{{$user->id}}'><br>
	@endforeach
	<input type="button" value="선택" onclick="send()">
</form>

<script type="text/javascript">
	function send()
	{
		var data = document.test.kang.value;
		window.opener.receiver_data(data);
		window.close();
	}
</script> 