@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <ul type="none">
                       <li>  <img class="img-responsive img-circle"  src="{{asset('uploads/profilePic/'.$user->userProfilePic->profile_pic)}}" style="height: 200px;width: 200px" alt="Avatar">  </li>
                       <li> Name:{{ $user->name}} </li>
                       <li> Email:{{$user->email}}</li>
                       <li> Username:{{$user->userBasic->username}}</li>
                       <li> City:{{$user->userBasic->city}}</li>
                       <li> State:{{$user->userBasic->state}}</li>
                       <li> Zip Code:{{$user->userBasic->zipcode}}</li>
                       <li> Website:{{$user->userBasic->website}}</li>
                           <li> Phone:{{$user->userBasic->phone}}</li>
                           <li> Date of Birth:{{$user->userBasic->dob}}</li>
                           <li> Firm:{{$user->userBasic->firm}}</li>
                           <li> Firm Website:{{$user->userBasic->firmWebsite}}</li>
                           <li> CRD Number:{{$user->userBasic->crdNumber}}</li>
                            <li> Details:{{$user->userDetails->details}}</li>
                             <li> Planning Process:{{$user->userDetails->planningProcess}}</li>
                              <li> Pricing Model:{{$user->userDetails->pricingModel }}</li>



                         <h5>Service:</h5>
                         @foreach($services as $service)
                         <li>{{$service->userService->name}}</li>
                         @endforeach
                       


                   </ul>
                   <h3>Education</h3>
                   <table border="2">
                     <tr>
                       <th>Degree</th>
                       <th>School</th>
                       <th>Major</th>
                       <th>Graduation Date</th>


                     </tr>
                     @foreach($user->userEducation as $education)
                     <tr>
                       <td>{{$education->degree}}</td>
                       <td>{{$education->school}}</td>
                       <td>{{$education->major}}</td>
                       <td>{{$education->graduationDate}}</td>

                     </tr>


                      @endforeach



                   </table>


                   <h3>Financial Examination</h3>
                   <table border="2">
                     <tr>
                       <th>Name</th>
                       <th>Exam COde</th>
                       <th>Passed Date</th>
                      


                     </tr>
                     @foreach($user->userFinancialExam as $exam)
                     <tr>
                       <td>{{$exam->name}}</td>
                       <td>{{$exam->exam_code}}</td>
                       <td>{{$exam->passed_date}}</td>
                       

                     </tr>


                      @endforeach



                   </table>

                   <h3>User Professional Designation</h3>
                   <table border="2">
                     <tr>
                       <th>Title</th>
                       <th>Short Desciption</th>
                       
                      


                     </tr>
                     @foreach($user->userProfessionalDesignation as $designation)
                     <tr>
                       <td>{{$designation->title}}</td>
                       <td>{{$designation->short_description}}</td>
                       
                       

                     </tr>


                      @endforeach



                   </table>


                   <h3>Working History</h3>
                   <table border="2">
                     <tr>
                       <th>Company</th>
                       <th>Location</th>
                       <th>Dates</th>
                       <th>Years</th>
                       
                      


                     </tr>
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
                            $date1 = strtotime($work->endDate);  
                            $date2 = strtotime(time());  
                              
                            $diff = abs($date2 - $date1);  
                            $years = floor($diff / (365*60*60*24));
                            echo $years;



                           } 
                             ?>
                         

                       </td>

                       
                       

                     </tr>


                      @endforeach



                   </table>
                   <br>
                   <h1>Send Request</h1>

                   <form action="/sendQuotaionRequest/{{$user->id}}" method="post">
                    @csrf

                    <label>you need help with: </label>
                    <input type="text" name="subject" required>
                    <br>
                    <label>Details: </label>
                    <textarea rows="5" cols="50" name="details" required></textarea>
                    <br>
                    <label>your Name: </label>
                    <input type="text" name="name" required>
                    <br>
                    <label>your Email </label>
                    <input type="email" name="email" required>
                    <br>
                    <label>your Phone: </label>
                    <input type="text" name="phone" required>
                    <br>
                    <label>your City: </label>
                    <input type="text" name="city" required>
                    <br>
                    <label>your state: </label>
                    <input type="text" name="state" required>
                    <br>
                    <label>your Zip Code: </label>
                    <input type="text" name="zipcode" required>
                    <br>
                    <button type="Submit">Submit</button>
                     



                   </form>



                  


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
