@extends('layouts.app')
@section('content')

Here is all qutoation Request
<br>
@foreach($quotationRequest as $request)
   
   Subject: {{$request->subject}}
   <br>
   Details: {{$request->details}}
   @if($user->role_id==2||!empty($request->invoice->transaction))
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
   @else
   <br>
   Name: ***
   <br>
   email: ***
   <br>
   Phone: ***
   <br>
   city: ******
   <br>
   State:***
   <br>
   Zip Code: ***
   <br>
   @endif
   <br>
   @if($user->role_id==2)
   @if(!empty($request->invoice))
   <a href="/quotationRequestApproved/{{$request->id}}">Approve</a> 
   @else
   <a href="/createInvoice/{{$request->id}}">Create Invoice</a>

   @endif
   
   <a href="#exampleModal" data-toggle="modal" data-target="#exampleModal" onclick="loadModalEdit('edit-quotation','{{$request->id}}')">Edit</a>  
    

   <a href="/quotationRequestCancel/{{$request->id}}">Cancel</a> 
   @else
   <br>
   <a href="/showInvoice/{{$request->invoice->id}}"> Show Invoice</a>
   @if(empty($request->invoice->transaction))
   <a href="/pay/{{$request->invoice->id}}"> Pay</a>
   @endif
   <a href="">Email</a><a href="/quotationRequestCancelUser/{{$request->id}}">Cancel</a>
   @endif
   <br>





@endforeach
@endsection