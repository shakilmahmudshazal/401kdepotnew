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
                     <form method="post" action="/saveProfilePic" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="profile_pic">Profile Pic</label> </br>
                    <input type="file" name="profile_pic">
                </div>

                <!-- <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('home') }}">BACK</a> -->
                <button type="submit" class="btn btn-primary">Save</button>
              
            </form>

            <br>

                   <form method="post" action="/updateProfile" id="infoForm">
                    @csrf


                    <label>Username: </label>
                    <input type="text" name="username"  value="@if(!empty($user->userBasic->username)){{$user->userBasic->username}}@endif" required>
                    <br>

                    <label>website: </label>
                    <input type="text" name="website"  value="@if(!empty($user->userBasic->website)){{$user->userBasic->website}}@endif">
                    <br>
                    <label>Firm: </label>
                    <input type="text" name="firm"  value="@if(!empty($user->userBasic->firm)){{$user->userBasic->firm}}@endif">

                    <br>

                     <label>Firm Website: </label>
                    <input type="text" name="firmWebsite"  value="@if(!empty($user->userBasic->firmWebsite)){{$user->userBasic->firmWebsite}}@endif">
                    <br>

                    <label>Phone: </label>
                    <input type="text" name="phone"  value="@if(!empty($user->userBasic->phone)){{$user->userBasic->phone}}@endif" required>
                    <br>
                    <label>State: </label>
                    <input type="text" name="state"  value="@if(!empty($user->userBasic->state)){{$user->userBasic->state}}@endif" required>
                    <br>
                    <label>City: </label>
                    <input type="text" name="City"  value="@if(!empty($user->userBasic->city)){{$user->userBasic->city}}@endif" required>
                    <br>
                    <label>Zip Code: </label>
                    <input type="text" name="zipcode"  value="@if(!empty($user->userBasic->zipcode)){{$user->userBasic->zipcode}}@endif" required>
                    <br>

                    <label>Date of Birth: </label>
                    <input type="date" name="dob"  value="@if(!empty($user->userBasic->dob)){{$user->userBasic->dob}}@endif">
                    <br>
                    <label>Your Details: </label>

                    <textarea rows="4" cols="60" name="details" >@if(!empty($user->userDetails->details)){{$user->userDetails->details}}@endif
                     </textarea>
                     <br>
                     <br>
                    <label>Your Pricing Model: </label>

                    <textarea rows="4" cols="60" name="pricingModel" >@if(!empty($user->userDetails->pricingModel)){{$user->userDetails->pricingModel}}@endif
                     </textarea>
                     <br>
                     <br>
                    <label>Your Planning Process: </label>

                    <textarea rows="4" cols="60" name="planningProcess" >@if(!empty($user->userDetails->planningProcess)){{$user->userDetails->planningProcess}}@endif
                     </textarea>
                     <br>
                    Your provided Service:
                    
                   @foreach ($userService as $service)
                   <ul>
                      <li>

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


                    <!-- <button type="submit">Save </button> -->
                     

                   </form>


                    <button class="btn btn-primary" type="submit" form="infoForm">Save </button>
                    <br>

                   <h3>Education</h3>

                   <table border="2">
                     <tr>
                       <th>Degree</th>
                       <th>School</th>
                       <th>Major</th>
                       <th>Graduation Date</th>
                       <!-- <th colspan="2"><a href="">Add New</a></th> -->
                       <th>
                       <!-- <button type="button" class="btn btn-black" data-toggle="modal" data-target="#exampleModal"> -->
                        <a data-toggle="modal" data-target="#exampleModal" href="#exampleModal" onclick="loadModal('addEducation')">Add New</a>
                        
                      

                      </th>

                     </tr>
                     @if(count($user->userEducation) > 0)
                     @foreach($user->userEducation as $education)
                     <tr>
                       <td>{{$education->degree}}</td>
                       <td>{{$education->school}}</td>
                       <td>{{$education->major}}</td>
                       <td>{{$education->graduationDate}}</td>
                       <th>
                         <!-- <button type="button" class="btn btn-black" data-toggle="modal" data-target="#exampleModal"> -->
                        <a href="#exampleModal" data-toggle="modal" data-target="#exampleModal" onclick="loadModalEdit('edit-education','{{$education->id}}')">Edit</a>
                     
                        <a class="btn btn-danger" href="{{URL::to('/deleteUserEducation/'.$education->id)}}">Detele</a>
                      </th>
                      
                       
                     </tr>
                      @endforeach
                      @endif


                   </table>
                   <br>


                   <h3>Financial Examination</h3>
                   <table border="2">
                     <tr>
                       <th>Name</th>
                       <th>Exam COde</th>
                       <th>Passed Date</th>
                        <th colspan="2">
                         
                           
                           <a data-toggle="modal" data-target="#exampleModal" href="#exampleModal" onclick="loadModal('addFinancialExam')">Add New</a>
                        
                            
                        
                      </button>
                        </th>

                      


                     </tr>
                     @if(count($user->userFinancialExam) > 0)
                     @foreach($user->userFinancialExam as $exam)
                     <tr>
                       <td>{{$exam->name}}</td>
                       <td>{{$exam->exam_code}}</td>
                       <td>{{$exam->passed_date}}</td>
                       <th>
                        
                        <a data-toggle="modal" data-target="#exampleModal" href="#exampleModal" onclick="loadModalEdit('edit-FinancialExam','{{$exam->id}}')">Edit</a>
                      
                      
                      </th>
                       <th>
                          <a class="btn btn-danger" href="{{URL::to('/delete-FinancialExam/'.$exam->id)}}">Detele</a>
                      </th>
                       

                     </tr>


                      @endforeach
                      @endif



                   </table>
                   <br>
                  

                   <h3>User Professional Designation</h3>
                   <table border="2">
                     <tr>
                       <th>Title</th>
                       <th>Short Desciption</th>
                        <th colspan="2">
                          
                        <a data-toggle="modal" data-target="#exampleModal" href="#exampleModal" onclick="loadModal('addProfessionalDesignation')">Add New</a>
                        
                    
                          
                        </th>

                     </tr>
                     @if(count($user->userProfessionalDesignation) > 0)
                     
                     @foreach($user->userProfessionalDesignation as $designation)
                     <tr>
                       <td>{{$designation->title}}</td>
                       <td>{{$designation->short_description}}</td>
                        <th>
                          
                        <a data-toggle="modal" data-target="#exampleModal" href="#exampleModal" onclick="loadModalEdit('edit-ProfessionalDesignation','{{$designation->id}}')">Edit</a>
                      
                          <a class="btn btn-danger" href="{{URL::to('/deleteProfessionalDesignation/'.$designation->id)}}">Detele</a>
                        </th>
                       

                     </tr>


                      @endforeach
                      @endif



                   </table>

                   <br>


                   <h3>Working History</h3>
                   <table border="2">
                     <tr>
                       <th>Company</th>
                       <th>Location</th>
                       <th>Dates</th>
                       <th>Years</th>
                        <th colspan="2">
                          
                        <a data-toggle="modal" data-target="#exampleModal" href="#exampleModal" onclick="loadModal('addUserWork')">Add New</a>
                        
                      </button>
                        </th>

                       
                      


                     </tr>
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
                            $date1 = strtotime($work->endDate);  
                            $date2 = strtotime(date('Y-m-d'));  
                              
                            $diff = abs($date1 - $date2);  
                            $years = floor($diff / (365*60*60*24));
                            echo $years;



                           } 
                             ?>


                       </td>
                        <th>
                          
                        <a data-toggle="modal" data-target="#exampleModal" href="#exampleModal" onclick="loadModalEdit('edit-UserWork','{{$work->id}}')">Edit</a>
                      

                        </th>
                        <th>
                          <a class="btn btn-danger" href="{{URL::to('/delete-UserWork/'.$work->id)}}">Detele</a>
                        </th>


                     </tr>


                      @endforeach
                      @endif



                   </table>

                     


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
