<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>401k Depot-profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/profile-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>


    <header>

        @include('layouts.navbar')
    </header>

    <!--    header section end-->


    <div class="profile-background"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ui class="profile-list">
                    <li><a href="#">{{ config('app.name', '401kdepot') }}</a></li>
                    <li>
                        <i class="fa fa-map-marker" style="color:blue"></i> <a href="#">{{$user->userBasic->city}}, {{$user->userBasic->state}}</a>
                    </li>
                    <li class="">
                        <!-- <i class="fa fa-exclamation-circle" style="color:blue"></i><a href="#">Login</a> -->
                    </li>
                </ui>
            </div>
        </div>
    </div>
    <!--share section start-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ui class="share-list">
                    <li>
                        <p>share:</p>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook-square" style="font-size:20px;color: #4C70A7"></i></a></li>
                    <li>
                        <a href=""><i class="fa fa-twitter-square" style="font-size:20px; color: #08BBEE"></i></a>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-google-plus-square" style="font-size:20px;color: #DD4B39"></i></a>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-linkedin-square" style="font-size:20px; color: #068CC0"></i></a>
                    </li>
                </ui>
            </div>
        </div>
    </div>

    <!--share section end-->
    <!--    content div start-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">

                <div class="container-lfuid">
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-4 col-xs-12">
                            <div style="margin-left: 10%">
                                <img src="{{asset('uploads/profilePic/'.$user->userProfilePic->profile_pic)}}" class="img-thumbnail rounded-circle" alt="breaked" width="150" height="150">
                            </div> 
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <h2 style="margin-top: 30px;color: #5A5A5A;">{{ $user->name}}</h2>
                            <p class="mb-0">CRD Number: {{$user->userBasic->crdNumber}}</p>
                            <p class="mb-0">Current Firm: <a href="{{$user->userBasic->firmWebsite}}">{{$user->userBasic->firm}}</a></p>
                            <p>Compensation Model: Fee Only</p>
                        </div>
                    </div>
                </div>

                <div class="container-lfuid">
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-4 col-xs-12 mb-20">
                            <img src="{{asset('img/Logo.png')}}" alt="breaked" width="200" height="100">
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <p style="margin-top: 10px">{{$user->userDetails->details}}</p>
                            <a class="btn btn-primary w-25" href=""> CONTACT </a>
                        </div>
                    </div>
                </div>

                <!--   Advisory Practice Details start-->
                <br><br>
                <div>
                    <h4 class="advisory" style="background-color: #F5F5F5; padding: 10px">Advisory Practice Details</h4>
                </div>
                <div class="conteiner-fluid">
                    <div class="row">
                        <div class="col-4">
                            <p><b>Services Offered:</b></p>
                        </div>
                        <div class="col-4">
                            <ul>
                                 @foreach($services as $service)
                                
                                    @if(!empty($service->userService->name))
                                    <li>
                                    <p>{{$service->userService->name}}</p>
                                    </li>
                                    @endif
                                
                                @endforeach
                                
                            </ul>
                        </div>
                        <!-- <div class="col-4">
                            <ul>
                                <li>
                                    <p>Career change</p>
                                </li>
                                <li>
                                    <p>Having a child</p>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                <hr>
                <!-- <div class="conteiner-fluid">
                    <div class="row">
                        <div class="col-4">
                            <p><b>Customer Specialties:</b></p>
                        </div>
                        <div class="col-4">
                            <ul>
                                <li>
                                    <p>Gen X</p>
                                </li>
                                <li>
                                    <p>Career changers</p>
                                </li>
                                <li>
                                    <p>Young professionals</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <ul>
                                <li>
                                    <p>Millennials</p>
                                </li>
                                <li>
                                    <p>Recent grads</p>
                                </li>
                                <li>
                                    <p>Entrepreneurs</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <hr>
                <div class="conteiner-fluid">
                    <div class="row">
                        <div class="col-4">
                            <p><b>Pricing Model:</b></p>
                        </div>
                        <div class="col-8">
                            <p>{{$user->userDetails->pricingModel }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="conteiner-fluid">
                    <div class="row">
                        <div class="col-4">
                            <p><b>Planning Process:</b></p>
                        </div>
                        <div class="col-8">
                            <p>{{$user->userDetails->planningProcess}}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <!--   Advisory Practice Details end-->
                <!--   Professional Designations and Affiliations start-->

                <div>
                    <h4 class="Professional bg-secondary" style="background-color: #F5F5F5; padding: 10px">Professional Designations and Affiliations</h4>
                </div>
                <div id="designation-slider" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <?php $i=0; ?>
                        @foreach($user->userProfessionalDesignation as $designation)
                        <li data-target="#designation-slider" data-slide-to="{{$i}}" class="active"></li>
                        <?php $i++; ?>
                        @endforeach
                        
                    </ul>
                    <div class="carousel-inner">
                        @foreach($user->userProfessionalDesignation as $designation)
                        <div class="carousel-item active" style="text-align: center">
                            <img src="{{asset('img/designation-adpa.png')}}" alt="Chicago" height="100" style="margin: 0px auto">
                            <h3 style="text-align: center;">{{$designation->title}}</h3>
                             <p style="text-align: center">{{$designation->short_description}}</p>
                        </div>
                        @endforeach
                        
                    </div>
                    <a class="carousel-control-prev" href="#designation-slider" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#designation-slider" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
                <!--   Professional Designations and Affiliations end-->

                <!--                Details section start-->

                <section id="details">



                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#details-one">Works Story</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#details-two">Financial Exams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#details-three">Education</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="details-one" class="tab-pane active"><br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                       <th>Company</th>
                       <th>Location</th>
                       <th>Dates</th>
                       <th>Years</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($user->userWork as $work)
                     <tr>
                       <td>{{$work->companyName}}</td>
                       <td>{{$work->location}}</td>
                       <td>{{$work->startingDate}}- @if($work->currentlyWorking==0){{$work->endDate}} @else current @endif </td>
                       <td>

                        <?php 

                           if($work->currentlyWorking==0)
                           {
                            $date1 = strtotime($work->endDate);  
                            $date2 = strtotime($work->startingDate);  
                              
                            $diff = abs($date1- $date2);  
                            $years = floor($diff / (365*60*60*24));

                            echo $years;

                           }
                           else{
                            $date1 = strtotime($work->startingDate);  
                            // $date2 = strtotime(time()); 
                            // $dateOfBirth = '1994-07-02';
                            $years = \Carbon\Carbon::parse($date1)->age; 
                              
                            // $diff = abs($date2 - $date1);  
                            // $years = floor($diff / (365*60*60*24));
                            echo $years;



                           } 
                             ?>
                         

                       </td>

                       
                       

                     </tr>


                      @endforeach

                                    
                                </tbody>
                            </table>
                        </div>
                        <div id="details-two" class=" tab-pane fade"><br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                       <th>Exam COde</th>
                                       <th>Passed Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($user->userFinancialExam as $exam)
                     <tr>
                       <td>{{$exam->name}}</td>
                       <td>{{$exam->exam_code}}</td>
                       <td>{{$exam->passed_date}}</td>
                       

                     </tr>


                      @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                        <div id="details-three" class=" tab-pane fade"><br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Degree</th>
                       <th>School</th>
                       <th>Major</th>
                       <th>Graduation Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($user->userEducation as $education)
                     <tr>
                       <td>{{$education->degree}}</td>
                       <td>{{$education->school}}</td>
                       <td>{{$education->major}}</td>
                       <td>{{$education->graduationDate}}</td>

                     </tr>


                      @endforeach
                                    
                                </tbody>
                            </table>


                        </div>
                    </div>



                </section>




                <!--                Details section end-->
                <!--                contact section start-->

                <div>
                    <h4 class="contact" style="background-color: #F5F5F5; padding: 10px">Contact Info for {{$user->name}}</h4>
                </div>
                <div>
                    <p style="margin-bottom: 0px"><i class="fa fa-location-arrow"></i><a href="#">{{$user->userBasic->city}}, {{$user->userBasic->state}} {{$user->userBasic->zipcode}}</a></p>
                    <p><i class="fa fa-phone"></i><strong>Phone Number:</strong> <a href="#"> {{$user->userBasic->phone}}</a></p>
                    <p style="margin-bottom: 0px"><strong>Advisor Website:</strong> <a href="{{$user->userBasic->website}}">{{$user->userBasic->website}}</a></p>
                    <p><strong>Firm Website:</strong> <a href="{{$user->userBasic->firmWebsite}}">{{$user->userBasic->firmWebsite}}</a></p>
                    <!-- <p>Registered State(s): LA NJ NY</p> -->
                </div>
                <!--                contact section end-->

            </div>

            <!--            Request Proposal section Start-->

            <div class="col-md-12 col-lg-4">
                @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif


                <div id="request-proposal">
                    <h3>Hire {{$user->name}}</h3>
                    
                    <form action="/sendQuotaionRequest/{{$user->id}}" method="post">
                    @csrf
                       
                        <label>you need help with: </label>
                    <input class="form-control" type="text" name="subject" required>
                    <br>
                    <label>Details: </label>
                    <textarea class="form-control" rows="5" cols="50" name="details" required></textarea>
                    <br>
                    <label>your Name: </label>
                    <input class="form-control" type="text" name="name" required>
                    <br>
                    <label>your Email </label>
                    <input class="form-control" type="email" name="email" required>
                    <br>
                    <label>your Phone: </label>
                    <input class="form-control" type="text" name="phone" required>
                    <br>
                    <label>your City: </label>
                    <input class="form-control" type="text" name="city" required>
                    <br>
                    <label>your state: </label>
                    <input class="form-control" type="text" name="state" required>
                    <br>
                    <label>your Zip Code: </label>
                    <input class="form-control" type="text" name="zipcode" required>
                    <br>
                    
                        <input type="submit" class="btn btn-primary form-control" value="REQUEST PROPOSAL">
                    </form>
                </div>


            </div>
        </div>
    </div>
    <!--   content section end-->






    <!--    Footer Section Start-->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="section-one">
                        <a href="#">HOME</a>
                        <a href="#">ABOUT US</a>
                        <a href="#">FOR ADVISORS</a>
                        <a href="#">FIND A FINANCIAL ADVISOR</a>
                        <a href="#">401K PLAN INFORMATION</a>
                        <a href="#">FAQ</a>
                        <a href="#">NEWS</a>
                        <a href="#">CONTACT US</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="section-two">
                        <img src="{{asset('images/logo-rapidSSL.png')}}" alt="">
                        <h4>We promise to keep your information safe and secure.</h4>
                        <a href="#">Read our Safety &amp; Security Promise »</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="section-three">
                        <h4>Ready to get started? Request proposals for help with your financial concerns.</h4>
                        <a href="#" class="btn btn-success form-control">Get Started!</a>

                        <a href="#" class="btn btn-light form-control">Log In</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="section-four">
                        <img src="{{asset('images/logo.png')}}" alt="">
                        <h4>Wealthminder, 9th Floor,<br>
                            1765 Greensboro Station Place,<br>
                            McLean, VA 22102</h4>
                        <a href="#">(571) 766-8021</a>
                        <a href="#">info@wealthminder.com</a>
                        <div>
                            <iframe src="https://www.google.com/maps/embed?" width="240" height="120" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                        <div>
                            <a href="#"><i class="fa fa-instagram" style="font-size:36px;color:#0083E0"></i></a>

                            <a href="#"><i class="fa fa-twitter" style="font-size:36px;color:#0083E0"></i></a>

                            <a href="#"><i class="fa fa-facebook-official" style="font-size:36px;color:#0083E0"></i></a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </footer>



    <!--    Footer section End -->

    <!--    ............................-->

    <!--    Copyright Section Start-->

    <section id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <p class="text-center">&copy; 2017 Wealthminder, Inc. All Rights Reserved.</p>
                </div>
                <div class="col-md-7">
                    <p class="text-center">
                        <a href="#">Terms Of Use </a> | <a href="#"> Privacy Policy</a>
                    </p>
                </div>
            </div>
        </div>
    </section>




    <!--    ............................-->

    <!--    Copyright Section End-->
    @include('layouts.popup')

</body>

</html>
