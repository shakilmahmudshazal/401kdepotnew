@extends('layouts.master')
@section('content')

<div class="col-8 ">
	<h2>Set your credentials </h2>
	<div >
	<form method="post" action="/pay/{{$invoice->id}}">
	@csrf

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
	<div class="form-group">
		<input class="form-control btn btn-success" type="submit" name="submit" value="confirm">



	</div>

	
	
	


</form>

</div>
</div>



@endsection