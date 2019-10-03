@extends('layouts.master')

@section('content')


    
    
        <div class="col-9 offset 3">
                        <h4>Your Notifications</h4>
                        <hr>
                        <div class="container">
                            <ul class="list-group">

                                @foreach($notification as $notification)
                                

                                <a href="{{$notification->link}}" class="list-group-item dismiss">
                                    <span style="float: left"><img src="{{asset('img/profile.jpg')}}" alt="" height="40" width="40" class="rounded-circle">
                                    </span>
                                    <span class="ml-2" style="font-weight: bold"></span> <span>{{$notification->details}}</span>
                                    <br>
                                    <span class="ml-2 text-muted"><i class="fa fa-clock-o"></i><?php

                                     $years = \Carbon\Carbon::parse($notification->created_at)->diffForHumans(); 
                                     echo $years;




                                    ?></span>
                                </a>
                                @endforeach
                                
                                

                               
                            </ul>
                        </div>

                    </div>


   
@endsection