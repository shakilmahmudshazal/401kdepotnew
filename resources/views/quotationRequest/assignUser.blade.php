<form action="{{URL::to('/assignUser')}}/{{$request->id}}" method="post" id="myForm">
	@csrf
	<div>
		<label>User id:</label>
		<input type="text" class="form-control" name="user_id">
	</div>
	
</form>
<script>
	$('.modal-title').html('Assign User');
	$(".btn-submit-action").on('click',function(){
		$("#myForm").submit();
	});
</script>