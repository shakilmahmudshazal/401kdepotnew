@extends('layouts.master')

@section('content')
                   @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif


 <div class="col-8  col-sm-8 col-md-9 col-lg-10">
                    <h1 style="margin-top: 35px">Here is all Quotaion Request</h1>
                    <hr>
                    
                    <hr>

                    <!--                    oder section start-->
 
                    <div class="orders">
                        <div class="row">

                            <!--                           Each Individual Orders Start-->

                            @foreach($quotationRequest as $request)
                            @if($request->status_id !=3 && $request->status_id !=1)

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="card oder-item">
                                    <div class="card-header">
                                        <h4>Request</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>Request descriptions</p>
                                        <table class="table table-bordered">
                                            <thead>

                                                <tr>
                                                    <th>Subject</th>
                                                    <th>{{$request->subject}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Details</td>
                                                    <td>{{$request->details}}</td>
                                                </tr>
                                                @if($request->status_id ==5)
                                                <tr>
                                                    <td>Name</td>
                                                    <td>{{$request->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{$request->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>{{$request->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td>{{$request->city}}, {{$request->state}},{{$request->zipcode}}</td>
                                                </tr>

                                                @else
                                                 <tr>
                                                    <td>Name</td>
                                                    <td>****</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>****</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>****</td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td>****</td>
                                                </tr>

                                                @endif

                                                <tr>
                                                    
                                                    <td class="alert alert-success" colspan="2"><?php

                                     $years = \Carbon\Carbon::parse($request->created_at)->diffForHumans(); 
                                     echo $years;




                                    ?></td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="card-footer">
                                        <div class="btn-group btn-block">
                                            @if(!empty($request->invoice))
   <!-- <a class="btn btn-success" href="/quotationRequestApproved/{{$request->id}}">Approve</a>  -->
   @else

   <!-- <a class="btn btn-info" href="/createInvoice/{{$request->id}}">Create Invoice</a> -->

   @endif
   
  <!--  <a class="btn btn-warning" href="#exampleModal" data-toggle="modal" data-target="#exampleModal" onclick="loadModalEdit('edit-quotation','{{$request->id}}')">Edit</a> -->

   @if(empty($request->user_id))

   <!-- <a class="btn btn-info" href="#exampleModal" data-toggle="modal" data-target="#exampleModal" onclick="loadModalEdit('assignUser','{{$request->id}}')">Assign Advisor</a> -->
   @endif

    

   <a class="btn btn-danger" href="/quotationRequestCancel/{{$request->id}}">Cancel</a> 
   
   <br>
   @if(!empty($request->invoice))
   <a class="btn btn-info" href="/showInvoice/{{$request->invoice->id}}"> Show Invoice</a>
   @endif
   @if(empty($request->invoice->transaction))
   @if(!empty($request->invoice))
   <a class="btn btn-success" href="/pay/{{$request->invoice->id}}"> Pay</a>
   @endif
   @endif
   
   
   <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 offset-4">
                                           
                                        
                                    </div>
                                </div>
                                 
                                
                            </div>
                           


@endsection