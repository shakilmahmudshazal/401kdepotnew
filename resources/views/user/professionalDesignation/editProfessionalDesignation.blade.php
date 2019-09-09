<form action="{{URL::to('/update-ProfessionalDesignation')}}/{{$editProfessionalDesignation->id}}" method="post" id="myForm">
	@csrf
	<div>
		<label>Title</label>
		<input type="text" class="form-control" name="title" value="{{$editProfessionalDesignation->title}}">
	</div>
	<div>
		<label>Short Description</label>
		<input type="text" class="form-control" name="short_description" value="{{$editProfessionalDesignation->short_description}}">
	</div>
</form>
<script>
	$('.modal-title').html('Edit Professional Designation');
	$(".btn-submit-action").on('click',function(){
		$("#myForm").submit();
	});
</script>