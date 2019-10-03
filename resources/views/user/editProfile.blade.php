<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>401k Depot:Profile Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>


    <header>

       @include('layouts.navbar')
       @include('layouts.modal')

    </header>


    <!--    pop-up sign up Start-->


    @include('layouts.popup')

    <!--    pop-up sign up End-->

    <!--    .........................................-->
    <!--    pop-up Login Start-->

    
    <!--    pop-up log in End-->

    <!--    .........................................-->

    <!--    Basic information Editing Section Start-->



    <section id="profile-edit">


        <div class="container">
          @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
            <h1 class="text-center">{{$user->name}}</h1>
            <div class="row">
                <div class="col-md-5 col-sm-12">
                    <img src="{{asset('uploads/profilePic/'.$user->userProfilePic->profile_pic)}}" class="rounded-circle img-thumbnail" alt="" height="150" width="150" style="margin-bottom: 15px">
                    <form method="post" action="/saveProfilePic" enctype="multipart/form-data">
                {{csrf_field()}}
                        <div class="form-group">
                            <input type="file" class="form-control" name="profile_pic" style="background-color:green;"></div>
                        <div class="form-group">
                            <input type="submit" value="SAVE" class="btn btn-primary"></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container">
            <h2>Basic Information</h2>
            <form method="post" action="/updateProfile" id="infoForm">
                    @csrf
                <div class="form-group">
                    <label for="username">User name :</label>
                    <input type="text" class="form-control" id="username" name="username"  value="@if(!empty($user->userBasic->username)){{$user->userBasic->username}}@endif" required>
                </div>
                <div class="form-group">
                    <label for="username">Compensation Model :</label>
                    <input type="text" class="form-control" id="compensationModel" name="compensationModel"  value="@if(!empty($user->userBasic->compensationModel)){{$user->userBasic->compensationModel}}@endif" required>
                </div>
                <div class="form-group">
                    <label for="website">Website :</label>
                    <input type="text" class="form-control" name="website"  value="@if(!empty($user->userBasic->website)){{$user->userBasic->website}}@endif">
                </div>
                <div class="form-group">
                    <label for="firm">Firm :</label>
                    <input type="text" class="form-control"name="firm"  value="@if(!empty($user->userBasic->firm)){{$user->userBasic->firm}}@endif">
                </div>
                <div class="form-group">
                    <label for="firm-website">Firm website :</label>
                    <input type="text" class="form-control"  name="firmWebsite"  value="@if(!empty($user->userBasic->firmWebsite)){{$user->userBasic->firmWebsite}}@endif">
                </div>
                <div class="form-group">
                    <label for="phone">Phone :</label>
                    <input type="text" class="form-control" id="phone" name="phone"  value="@if(!empty($user->userBasic->phone)){{$user->userBasic->phone}}@endif" required>
                </div>
                <div class="form-group">
                    <label for="state">State :</label>
                    <input type="text" class="form-control" name="state"  value="@if(!empty($user->userBasic->state)){{$user->userBasic->state}}@endif" required>
                </div>
                <div class="form-group">
                    <label for="city">City :</label>
                    <input type="text" class="form-control" name="city"  value="@if(!empty($user->userBasic->city)){{$user->userBasic->city}}@endif" required>
                </div>
                <div class="form-group">
                    <label for="zipcode">Zipcode :</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode"  value="@if(!empty($user->userBasic->zipcode)){{$user->userBasic->zipcode}}@endif" required>
                </div>
                <div class="form-group">
                    <label for="dob">Date of birth :</label>
                    <input type="date" class="form-control" id="dob" name="dob"  value="@if(!empty($user->userBasic->dob)){{$user->userBasic->dob}}@endif">
                </div>
                <div class="form-group">
                    <label for="details">Your details :</label>
                    <textarea name="details" id="details" cols="30" rows="6" class="form-control">@if(!empty($user->userDetails->details)){{$user->userDetails->details}}@endif </textarea>
                </div>
                <div class="form-group">
                    <label for="pricing-model">Your pricing model :</label>
                    <textarea  id="pricing-model" cols="30" rows="6" class="form-control" name="pricingModel" >@if(!empty($user->userDetails->pricingModel)){{$user->userDetails->pricingModel}}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="planning-process">Your planning process :</label>
                    <textarea name="planningProcess" id="planning-process" cols="30" rows="6" class="form-control" >@if(!empty($user->userDetails->planningProcess)){{$user->userDetails->planningProcess}}@endif </textarea>
                </div>
                <div class="form-group">
                    <label for="provide-services">Your provided services :</label>

                    @foreach ($userService as $service)
                   <ul class="list-group">
                      <li class="list-group-item">

                      <input type="checkbox" name="services[]" value="{{$service->id}}"
                      @foreach($user->userServiceRelation as $sr) 

                      @if(($sr->user_service_id)==$service->id) 

                      checked 

                      @endif
                      @endforeach
                      />{{$service->name}}<br />
                       
                       

                      </li> 

                   </ul>
                   
                   @endforeach

                   
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form><br>
        </div>
        <div class="container">
            <h1>Education and Others</h1>

            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#education">Educations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#financial-examination">Financial Examinations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#professional">User professional Designation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#working-story">Working Story</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="education" class="container tab-pane active"><br>
                    <div class="row">
                        <table class="table table-bordered">
                            <thead> 
                                <tr>
                                    <th>Degree</th>
                                    <th>School</th>
                                    <th>Major</th>
                                    <th>Graduation Date</th>
                                    
                                    <th><a class="fa fa-plus btn btn-success" data-toggle="modal" data-target="#exampleModal" href="#exampleModal" onclick="loadModal('addEducation')">Add New</a>
                        </th>
                                </tr>
                            </thead>
                            <tbody>
                               @if(count($user->userEducation) > 0)
                     @foreach($user->userEducation as $education)
                     <tr>
                       <td>{{$education->degree}}</td>
                       <td>{{$education->school}}</td>
                       <td>{{$education->major}}</td>
                       <td>{{$education->graduationDate}}</td>
                       <th>
                         <!-- <button type="button" class="btn btn-black" data-toggle="modal" data-target="#exampleModal"> -->
                        <a class="btn btn-info" href="#exampleModal" data-toggle="modal" data-target="#exampleModal" onclick="loadModalEdit('edit-education','{{$education->id}}')">Edit</a>
                     
                        <a class="btn btn-danger" href="{{URL::to('/deleteUserEducation/'.$education->id)}}">Detele</a>
                      </th>
                      
                       
                     </tr>
                      @endforeach
                      @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="financial-examination" class="container tab-pane fade"><br>
                <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                       <th>Name</th>
                       <th>Exam COde</th>
                       <th>Passed Date</th>
                        <th colspan="2">
                         
                           
                           <a class="fa fa-plus btn btn-success" data-toggle="modal" data-target="#exampleModal" href="#exampleModal" onclick="loadModal('addFinancialExam')">Add New</a>
                        
                            
                        
                      </button>
                        </th>

                      


                     </tr>
                            </thead>
                            <tbody>
                               @if(count($user->userFinancialExam) > 0)
                     @foreach($user->userFinancialExam as $exam)
                     <tr>
                       <td>{{$exam->name}}</td>
                       <td>{{$exam->exam_code}}</td>
                       <td>{{$exam->passed_date}}</td>
                       <th>
                        
                        <a class="btn btn-info" data-toggle="modal" data-target="#exampleModal" href="#exampleModal" onclick="loadModalEdit('edit-FinancialExam','{{$exam->id}}')">Edit</a>
                      
                      
                      </th>
                       <th>
                          <a class="btn btn-danger" href="{{URL::to('/delete-FinancialExam/'.$exam->id)}}">Detele</a>
                      </th>
                       

                     </tr>


                      @endforeach
                      @endif

                            </tbody>
                        </table>
                    </div>

                </div>
                <div id="professional" class="container tab-pane fade"><br>
                <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                 <tr>
                       <th>Title</th>
                       <th>Short Desciption</th>
                        <th colspan="2">
                          
                        <a  class="fa fa-plus btn btn-success" data-toggle="modal" data-target="#exampleModal" href="#exampleModal" onclick="loadModal('addProfessionalDesignation')">Add New</a>
                        
                    
                          
                        </th>

                     </tr>
                            </thead>
                            <tbody>
                                @if(count($user->userProfessionalDesignation) > 0)
                     
                     @foreach($user->userProfessionalDesignation as $designation)
                     <tr>
                       <td>{{$designation->title}}</td>
                       <td>{{$designation->short_description}}</td>
                        <th>
                          
                        <a class="btn btn-info" data-toggle="modal" data-target="#exampleModal" href="#exampleModal" onclick="loadModalEdit('edit-ProfessionalDesignation','{{$designation->id}}')">Edit</a>
                      
                          <a class="btn btn-danger" href="{{URL::to('/deleteProfessionalDesignation/'.$designation->id)}}">Detele</a>
                        </th>
                       

                     </tr>


                      @endforeach
                      @endif


                            </tbody>
                        </table>
                    </div>

                </div>
                <div id="working-story" class="container tab-pane fade"><br>
                <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                       <th>Company</th>
                       <th>Location</th>
                       <th>Dates</th>
                       <th>Years</th>
                        <th colspan="2">
                          
                        <a class="fa fa-plus btn btn-success" data-toggle="modal" data-target="#exampleModal" href="#exampleModal" onclick="loadModal('addUserWork')">Add New</a>
                        
                      
                        </th>

                       
                      


                     </tr>
                            </thead>
                            <tbody>
                                @if(count($user->userWork) > 0)
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
                        <th>
                          
                        <a class="btn btn-info" data-toggle="modal" data-target="#exampleModal" href="#exampleModal" onclick="loadModalEdit('edit-UserWork','{{$work->id}}')">Edit</a>
                      

                        </th>
                        <th>
                          <a class="btn btn-danger" href="{{URL::to('/delete-UserWork/'.$work->id)}}">Detele</a>
                        </th>


                     </tr>


                      @endforeach
                      @endif

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


        </div>

    </section>

    <!--    Basic information Editing Section End-->

    <!--    ............................-->

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
                        <img src="images/logo-rapidSSL.png" alt="">
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
                        <img src="images/logo.png" alt="">
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

</body>

</html>
