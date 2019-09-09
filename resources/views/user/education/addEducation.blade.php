<form action="{{url('/save-education')}}" method="post" id="myForm">
	@csrf
	<div>
		<label>Degree</label>
		<input type="text" class="form-control" name="degree">
	</div>
	<div>
		<label>School</label>
		<input type="text" class="form-control" name="school">
	</div>
	<div>
		<label>Major</label>
		<input type="text" class="form-control" name="major">
	</div>
	<div>
		<label>Graduation Date</label>
		<input type="date" class="form-control" name="graduationDate">
	</div>
</form>
<script>
	$('.modal-title').html('Education Add');
	$(".btn-submit-action").on('click',function(){
		$("#myForm").submit();
	});
</script>