@extends('layouts.app')

@section('content')

<div class='container'>
	<div class="col-sm-8 offset-3">

	<table border="">
	<tr>
		<th>id</th>
		<th>Name</th>
		<th>username</th>
		<th>email</th>
		
	</tr> 
	@foreach($users as $user)
	<tr>
		<td>{{$user->id}}</td>
		<td>{{$user->name}}</td>
		<td>{{$user->userBasic->username}}</td>
		<td>{{$user->email}}</td>
	</tr>
		
	@endforeach


	</table>
	
</div>

</div>

@endsection