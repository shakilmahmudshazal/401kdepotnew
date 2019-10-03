@extends('layouts.master')
@section('content')
@if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
	<form action="/createInvoice/{{$quotation->id}}" method="post">
		@csrf
		
		<div class="form-group">
			<label> Type amount</label>
			<input class="form-control" type="text" name="amount">
		</div>
		<div class="form-group">
			<label> Issue Date</label>
			<input class="form-control" type="Date" name="issueDate">
		</div>
		<div class="form-group">
			<label> Due Date</label>
			<input class="form-control" type="Date" name="dueDate">
		</div>
		<div>
			<input type="submit" name="submit" value="Create">
		</div>
		

	</form>
@endsection