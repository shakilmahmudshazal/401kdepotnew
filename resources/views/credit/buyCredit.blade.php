@extends('layouts.app')
@section('content')

<form method="post" action="/buyCredit/{{auth()->id()}}">
	@csrf
	<div>
		<label>Credit Points:</label>
		<input type="text" name="creditPoints" >



	</div>



	<div>
		<label>Your Credit Card:</label>
		<input type="text" name="creditCard" >



	</div>
	<div>
		<label>Your Credit Expire date:</label>
		<input type="month" id="exp" name="exp"
       min="2019-09" value="">

		

	</div>
	<div>
		<label>CVV:</label>
		<input type="text" name="code" >



	</div>

	<input type="submit" name="submit" value="confirm">
	
	


</form>



@endsection