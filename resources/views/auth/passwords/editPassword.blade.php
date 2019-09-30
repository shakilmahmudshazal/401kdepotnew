@extends('layouts.master')
@section('content')

<form action="/editPassword" method="POST">
	@csrf
	<div class="form-group">
		<label>Old Password</label>
		<input type="password" name="oldPassword" class="form-control" required>
		
	</div>
	<div class="form-group">
		<label>New Password</label>
		<input type="password" name="newPassword" class="form-control" required>
		
	</div>
	<input type="submit" name="save" value="Change Password">
	
</form>

<div class="card">
	@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
	
</div>

@endsection