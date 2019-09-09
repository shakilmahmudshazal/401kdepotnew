<form action="{{URL::to('/update-FinancialExam')}}/{{$editFinancialExam->id}}" method="post" id="myForm">
	@csrf
	<div>
		<label>Exam Code</label>
		<input type="text" class="form-control" name="exam_code" value="{{$editFinancialExam->exam_code}}" >
	</div>
	<div>
		<label>Name</label>
		<input type="text" name="name" class="form-control"  value="{{$editFinancialExam->name}}">
	</div>
	<div>
		<label>Passed Date</label>
		<input type="date" name="passed_date" class="form-control" value="{{$editFinancialExam->passed_date}}">
	</div>
</form>
<script>
	$('.modal-title').html('Edit Financial Exam');
	$(".btn-submit-action").on('click',function(){
		$("#myForm").submit();
	});
</script>