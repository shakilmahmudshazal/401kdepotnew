<form action="{{url('/save-UserWork')}}" method="post" id="myForm">
	@csrf
	<div>
		<label>Company Name</label>
		<input type="text" class="form-control" name="companyName">
	</div>
	<div>
		<label>Location</label>
		<input type="text" class="form-control" name="location">
	</div>
	<div>
		<label>Starting Date</label>
		<input type="date" class="form-control" name="startingDate">
	</div>
	<div>
		<label>Website</label>
		<input type="text" class="form-control" name="website">
	</div>
	<div>
		<label>End Date</label>
		<input type="date" class="form-control" name="endDate">
	</div>
	<br>
	<div>
		<label>Currently Working</label>
		<input name="currentlyWorking" type="checkbox" value="1">


		<!-- <input type="tinyint" class="form-control" name="currentlyWorking" value="1"> -->
	</div>
</form>
<script>
	$('.modal-title').html('Education Add');
	$(".btn-submit-action").on('click',function(){
		$("#myForm").submit();
	});
</script>