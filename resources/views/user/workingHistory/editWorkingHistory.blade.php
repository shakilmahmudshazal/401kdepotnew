<form action="{{URL::to('/update-Work')}}/{{$editUserWork->id}}" method="post" id="myForm">
	@csrf
	<div>
		<label>Company Name</label>
		<input type="text" class="form-control" name="companyName" value="{{$editUserWork->companyName}}">
	</div>
	<div>
		<label>Location</label>
		<input type="text" class="form-control" name="location" value="{{$editUserWork->location}}">
	</div>
	<div>
		<label>Starting Date</label>
		<input type="date" class="form-control" name="startingDate" value="{{$editUserWork->startingDate}}">
	</div>
	<div>
		<label>Website</label>
		<input type="text" class="form-control" name="website" value="{{$editUserWork->website}}">
	</div>
	<div>
		<label>End Date</label>
		<input type="date" class="form-control" name="endDate" value="{{$editUserWork->endDate}}">
	</div>
	<br>
	<div>
		<label>Currently Working</label>
		<input name="currentlyWorking" type="checkbox" value="1" 
        @if($editUserWork->currentlyWorking==1)
        checked
       
        @endif



		>


		<!-- <input type="tinyint" class="form-control" name="currentlyWorking" value="1"> -->
	</div>
</form>
<script>
	$('.modal-title').html('Update Education');
	$(".btn-submit-action").on('click',function(){
		$("#myForm").submit();
	});
</script>