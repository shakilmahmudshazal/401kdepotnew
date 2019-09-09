<form action="{{URL::to('/update-education')}}/{{$editEducation->id}}" method="post" id="myForm">
	@csrf
	<div>
		<label>Degree</label>
		<input type="text" name="degree" class="form-control" value="{{$editEducation->degree}}">
	</div>
	<div>
		<label>School</label>
		<input type="text" name="school" class="form-control" value="{{$editEducation->school}}">
	</div>
	<div>
		<label>Major</label>
		<input type="text" name="major" class="form-control" value="{{$editEducation->major}}">
	</div>
	<div>
		<label>Graduation Date</label>
		<input type="date" name="graduationDate" class="form-control" value="{{$editEducation->graduationDate}}">
	</div>
</form>
<script>
	$('.modal-title').html('Update Education');
	$(".btn-submit-action").on('click',function(){
		$("#myForm").submit();
	});
</script>