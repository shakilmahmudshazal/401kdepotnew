<!DOCTYPE html>
<html>
<head>
	<title>Create your Invoice</title>
</head>
<body>
	<form action="/createInvoice/{{$quotation->id}}" method="post">
		@csrf
		
		<div>
			<label> Type amount</label>
			<input type="text" name="amount">
		</div>
		<div>
			<label> Issue Date</label>
			<input type="Date" name="issueDate">
		</div>
		<div>
			<label> Due Date</label>
			<input type="Date" name="dueDate">
		</div>
		<div>
			<input type="submit" name="submit" value="Create">
		</div>
		

	</form>

</body>
</html>