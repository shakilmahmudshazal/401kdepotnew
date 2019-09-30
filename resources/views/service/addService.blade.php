@extends('layouts.master')
@section('content')

<form action="/addService" method="POST">
	@csrf
	<div class="form-group">
		<label>Service:</label>
		<input class="form-control" type="text" name="name" required>
		
	</div>
	<input class="btn btn-success" type="submit" name="submit" value="save">

</form>

<br>
<br>
<br>
All Service List
<ul class="list-group">
	@foreach($service as $service)
  <li class="list-group-item">{{$service->name}}</li>
  @endforeach
  
</ul>

@endsection