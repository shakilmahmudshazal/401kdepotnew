<form action="{{url('/save-ProfessionalDesignation')}}" method="post" id="myForm">
	@csrf
	<div>
		<label>Title</label>
		<input type="text" class="form-control" name="title">
	</div>
	<div>
		<label>Short Description</label>
		<input type="text" class="form-control" name="short_description">
	</div>
</form>
<script>
	$('.modal-title').html('Add Professional Designation');
	$(".btn-submit-action").on('click',function(){
		$("#myForm").submit();
	});
</script>