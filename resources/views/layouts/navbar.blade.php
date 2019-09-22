<nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('images/logo_sprite1.png')}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <i class="fa fa-bars" style="font-size:24px;color:white"></i>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto">
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Resources</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Help</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="/submitRequest">Submit Request</a>
                        </li>
                        @guest

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#myLoginModal" href="#">Log In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sign-up-btn" data-toggle="modal" data-target="#mySignUpModal" href="#">Sign Up</a>
                        </li>
                        @else

                        <li class="nav-item">
                            <a class="nav-link" href="/home">Dashboard</a>
                        </li>

                         <li class="nav-item"> 
                            <a class="nav-link" href="/showProfile">{{ Auth::user()->name }}</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="/editProfile">Profile Edit</a></li>

                            <li class="nav-item">
                            <a class="nav-link" href="/quotationRequest">All request</a></li>


                         <li class="nav-item">
                           <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>