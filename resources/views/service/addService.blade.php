@extends('layouts.master')
@section('content')
@if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

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
<h1>All Service List</h1>
<ul class="list-group">
	<table>
	@foreach($service as $service)
   
   	<tr>
   		<th> <li class="list-group-item"> {{$service->name}} </li> </th>
   		<th><a class="btn btn-danger" href="/deleteService/{{$service->id}}"> Delete</a> </th>
   	</tr>
   

     
  @endforeach
  </table>
</ul>

@endsection