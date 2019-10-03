<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>401k Depot: User Dashboard</title>
    @include('layouts.links')

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="{{asset('images/logo.png')}}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <i class="fa fa-bars" style="font-size:24px;"></i>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">

                        <form>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search for..">
                                <div class="input-group-append">
                                    <button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </li>
                   <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell fa-fw"></i>
                            <span class="badge badge-danger"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                           <!--  <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div> -->
                            @if( Auth::user()->role_id ==2)
                            <a class="dropdown-item" href="/showAllNotificationAdmin"> see all notification</a>
                            @else
                            <a class="dropdown-item" href="/showAllNotification"> See all notification</a>
                            @endif

                        </div>
                    </li>
                    <!-- <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-envelope fa-fw"></i>
                            <span class="badge badge-danger">7</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li> -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle fa-fw"></i>{{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="/showProfile">Your Profile</a>
                            <a class="dropdown-item" href="/editProfile">Edit Profile</a>
                            <a class="dropdown-item" href="/editPassword">Edit Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-4 col-sm-4 col-md-3 col-lg-2" style="background-color: #343A50">
                    <div id="user-sidebar" style="padding: 25px 0">
                        <ul class="sidebar navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="/home">
                                    <i class="fa fa-tachometer"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-area-chart"></i>
                                    <span>Charts</span></a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="/buyCredit">
                                    <i class="fa fa-area-chart"></i>
                                    <span>Buy Credit</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-table"></i>
                                    <span>Tables</span></a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-8  col-sm-8 col-md-9 col-lg-10">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <h1 style="margin-top: 35px">Welcome {{$user->name}}</h1>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card bg-info">
                                <div class="card-body">New Request! <i class="fa fa-fw fa-comments"></i></div>
                                <a href="/newQuotationRequest" class="card-footer">
                                    <span style="float: left"> View Details</span>
                                    <span style="float: right"><i class="fa fa-arrow-right"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card bg-warning">
                                <div class="card-body">All Request <i class="fa fa-fw fa-comments"></i></div>
                                <a href="/allQuotationRequest" class="card-footer">
                                    <span style="float: left"> View Details</span>
                                    <span style="float: right"><i class="fa fa-arrow-right"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card bg-secondary">
                                <div class="card-body">Paid Request <i class="fa fa-fw fa-comments"></i></div>
                                <a href="/paidQuotationRequest" class="card-footer">
                                    <span style="float: left"> View Details</span>
                                    <span style="float: right"><i class="fa fa-arrow-right"></i></span>
                                </a>
                            </div>
                        </div>
                        <!-- <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card bg-success">
                                <div class="card-body">6 New Notifications! <i class="fa fa-fw fa-comments"></i></div>
                                <a href="#" class="card-footer">
                                    <span style="float: left"> View Details</span>
                                    <span style="float: right"><i class="fa fa-arrow-right"></i></span>
                                </a>
                            </div>
                        </div> -->
                    </div>
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
                                          {{$quotationRequest->links()}}  
                                        
                                    </div>
                                </div>
                                 
                                
                            </div>
                           

                            <!--                           Each Individual Orders End-->


                            
                    <!--                    order section End-->
                    <!--                   ........................-->


                    <hr>

                    <!--                    Notification area start-->


                    <div class="notifications-area">
                        <h4>Your Notifications</h4>
                        <hr>
                        <div class="container">
                            <ul class="list-group">

                                @foreach($user->notificationUser as $notification)
                                

                                <a href="#" class="list-group-item dismiss">
                                    <span style="float: left"><img src="{{asset('img/profile.jpg')}}" alt="" height="40" width="40" class="rounded-circle">
                                    </span>
                                    <span class="ml-2" style="font-weight: bold"></span> <span>{{$notification->details}}</span>
                                    <br>
                                    <span class="ml-2 text-muted"><i class="fa fa-clock-o"></i> 2h</span>
                                </a>
                                @endforeach
                                
                                

                               
                            </ul>
                        </div>

                    </div>



                    <!--                    Notification area End-->
                    <!--                    ............................-->
                    <br>
                    <br>
                    <br>

                </div>


            </div>
        </div>


    </main>

</body>

</html>
 @include('layouts.modal') 