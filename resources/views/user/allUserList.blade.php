@extends('layouts.master')

@section('content')

<div class='container'>
	<div class="col-12 ">

	<table class="table table-sm table-dark" border="2">
	<tr class="table-primary">
		<th>id</th>
		<th>Name</th>
		<th>username</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Credit Own</th>
		
	</tr> 
	@foreach($users as $user)
	
	
		<tr  >
		<td>{{$user->id}}</td>
		<td><a href="/searchProfile/{{$user->id}}">{{$user->name}}</a></td>
		<td>{{$user->userBasic->username}}</td>
		<td>{{$user->email}}</td>
		<td>{{$user->userBasic->phone}}</td>
		@if(!empty($user->credit->credit))
		<td>{{$user->credit->credit}}</td>
		@else
		<td>0</td>
		@endif

	</tr>

	

	
		
	@endforeach


	</table>
	
</div>

</div>

@endsection