

<form action="{{url('/save-FinancialExam')}}" method="post" id="myForm">
	@csrf
	<div>
		<label>Exam Code</label>
		<input type="text" class="form-control" name="exam_code">
	</div>
	<div>
		<label>Name</label>
		<input type="text" class="form-control" name="name">
	</div>
	<div>
		<label>Passed Date</label>
		<input type="date" class="form-control" name="passed_date">
	</div>
</form>
<script>
	$('.modal-title').html('FinancialExam Add');
	$(".btn-submit-action").on('click',function(){
		$("#myForm").submit();
	});
</script>