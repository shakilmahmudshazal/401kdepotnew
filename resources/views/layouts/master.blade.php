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
                            <span class="badge badge-danger">9+</span>
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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-folder"></i>
                                    <span>Pages</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                                    <h6 class="dropdown-header">Login Screens:</h6>
                                    <a class="dropdown-item" href="#">Login</a>
                                    <a class="dropdown-item" href="#">Register</a>
                                    <a class="dropdown-item" href="#">Forgot Password</a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Other Pages:</h6>
                                    <a class="dropdown-item" href="#">Blank Page</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-area-chart"></i>
                                    <span>Charts</span></a>
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
                    
                    <hr>
                    
                    <hr>

                    <!--                    oder section start-->

                    
                            <div class="container">
                                
                                 
                                
                            </div>
                           

                            <!--                           Each Individual Orders End-->


                            
                    <!--                    order section End-->
                    <!--                   ........................-->


                    <hr>

                    <!--                    Notification area start-->


                   @yield('content')



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