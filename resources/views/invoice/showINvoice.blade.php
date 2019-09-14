
@extends('layouts.app')

@section('content')

	total ammount: {{$invoice->amount}}
	<br>
	Issue date: {{$invoice->issueDate}}
	<br>
	Due date: {{$invoice->dueDate}}

<br>
	<a href="/pay/{{$invoice->id}}"> Pay</a>

@endsection
