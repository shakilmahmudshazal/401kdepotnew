@extends('layouts.app')
@section('content')

Here is all qutoation Request
<br>
@foreach($quotationRequest as $request)
   
   Subject: {{$request->subject}}
   <br>
   Details: {{$request->details}}
   <br>
   Name: {{$request->name}}
   <br>
   email: {{$request->email}}
   <br>
   Phone: {{$request->phone}}
   <br>
   city: {{$request->city}}
   <br>
   State: {{$request->state}}
   <br>
   Zip Code: {{$request->zipcode}}
   <br>
   <br>
   @if($user->role_id==2)
   <a href="/quotationRequestApproved/{{$request->id}}">Approve</a>   
   
   <a href="#exampleModal" data-toggle="modal" data-target="#exampleModal" onclick="loadModalEdit('edit-quotation','{{$request->id}}')">Edit</a>  

   <a href="/quotationRequestCancel/{{$request->id}}">Cancel</a> 
   @else
   <br>
   <a href="">Email</a><a href="/quotationRequestCancelUser/{{$request->id}}">Cancel</a>
   @endif
   <br>





@endforeach
@endsection