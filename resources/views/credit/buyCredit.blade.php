@extends('layouts.master')
@section('content')

<form method="post" action="/buyCredit/{{auth()->id()}}">
	@csrf
	<div class="form-group">
		<label>Credit Points:</label>
		<input class="form-control" type="text" name="creditPoints" >



	</div>



	<div class="form-group">
		<label>Your Credit Card:</label>
		<input class="form-control" type="text" name="creditCard" >



	</div>
	<div class="form-group">
		<label>Your Credit Expire date:</label>
		<input class="form-control" type="month" id="exp" name="exp"
       min="2019-09" value="">

		

	</div>
	<div class="form-group">
		<label>CVV:</label>
		<input class="form-control" type="text" name="code" >



	</div>

	<input class="btn btn-success" type="submit" name="submit" value="confirm">
	
	


</form>



@endsection