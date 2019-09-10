@extends('layouts.app')
@section('content')

<form method="post" action="/pay">
	@csrf

	<div>
		<label>Your Credit Card:</label>
		<input type="text" name="creditCard" >



	</div>
	<div>
		<label>Your Credit Expire date:</label>
		<input type="month" id="exp" name="exp"
       min="2019-09" value="">

		

	</div>

	<input type="submit" name="submit">
	
	


</form>



@endsection