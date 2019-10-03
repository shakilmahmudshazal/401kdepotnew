<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>401k Depot-Advisor Search</title>
   @include('layouts.links')


</head>

<body>


    <header>

       @include('layouts.navbar')

    </header>

    <!--    header section end-->

    <!--    ..............................-->

    <!--   advisor background Start-->

    <section id="advisor-background">
        <div class="advisor-heaing">
            <p class="text-center" style="color: white; font-family: lato;">Search Financial Advisors</p>
        </div>

        <div class="browse-advisor"> 
            <div class="container">
                <form class="form-view" method="get" action="/search">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control" placeholder="Search" name="service">
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control" placeholder="City/State" id="place" name="place">
                             <div id="placeList"></div>
                        </div>
                        <div class="col-12 col-md-12">
                            <input type="submit" class="form-control btn btn-success" id="submit" value="SEARCH" name="email">
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </section>

    <!--   advisor background End-->
    <!--...........................-->

    

    <!--    Main section start-->

    <!--    advisor url start-->

    <section id="advisor-url">

        <!--        <div class="advisor-background"></div>-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">401k Depot</a></li>
                        <li class="breadcrumb-item"><a href="#">Advisors</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--    advisor url End-->
    <!--.................................-->

    <!--    filtering section Start-->
    <section id="filtering">

        <div class="container">
            <h2>Here is our all available  Financial Advisors</h2>
            <h4 class="text-justify">401kdepot helps connect you with suitable financial advisors. Regardless of the type of assistance you need (financial planning, retirement planning, wealth management, tax planning, risk management, investment management, or any other area of financial planning), 401kdepot can help.</h4>
        </div>
        <!-- <div class="container">
            <div class="jumbotron">
                <h3>FILTER</h3>
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="distance">Distance</label>
                            <select class="form-control" id="distance" name="distance">
                                <option>Metro area (50 miles)</option>
                                <option>Metro area (30 miles)</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                        <label for="COMPENSATION">COMPENSATION</label>
                            <select class="form-control" id="COMPENSATION" name="COMPENSATION">
                                <option>Free Only</option>
                                <option>Commision Only</option>
                                <option>Either</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                        <label for="DESIGNATIONS">DESIGNATIONS</label><br>
                        <input type="checkbox" name="DESIGNATIONS"> CFP 
                        <input type="checkbox" name="DESIGNATIONS"> CFA 
                        <input type="checkbox" name="DESIGNATIONS"> ChFC 
                        <input type="checkbox" name="DESIGNATIONS"> CDFA 
                        <input type="checkbox" name="DESIGNATIONS"> CPA 
                                
                        </div>
                    </div><br>
                    <div class="row">
                       <div class="col-md-4">
                        <input type="submit" value="APPLY" name="submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div> -->

    </section>


    <!--    filtering section End-->



    <!--share section start-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ui class="share-list">
                    <li>
                        <p>Share by:</p>
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
    <!--    .............................-->




    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">

                <!--   Each advisor section start-->
                @foreach($users as $user) 

                <section id="each-advisor">

                    <div class="container-lfuid">
                        <div class="row" style="margin-top: 10px">
                            <div class="col-md-4 col-xs-12">
                                <div style="margin-left: 10%">
                                    <img src="{{asset('uploads/profilePic/'.$user->userProfilePic->profile_pic)}}" class="img-thumbnail rounded-circle" alt="breaked" width="150" height="150">
                                </div>
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <h2 style="margin-top: 30px;color: #5A5A5A;"><a href="/searchProfile/{{$user->id}}">{{$user->name}}</a></h2>
                                <p class="mb-0">CRD Number: {{$user->userBasic->crdNumber}}</p>
                                <p class="mb-0">Current Firm: <a href="{{ URL::to('http://'.$user->userBasic->firmWebsite) }}">{{$user->userBasic->firm}}</a></p>
                                <p>Compensation Model: {{$user->userBasic->compensationModel}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="container-lfuid">
                        <div class="row" style="margin-top: 20px">
                            <div class="col-md-4 col-xs-12 mb-20">
                                <!--                           working logo-->
                               <!--  <img src="img/Logo.png" alt="breaked" width="200" height="100"> -->
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <p style="margin-top: 10px">{{$user->userDetails->details}} </p>
                                <a class="btn btn-primary w-25" href="/searchProfile/{{$user->id}}"> CONTACT </a>
                            </div>
                        </div>
                    </div>

                </section>
                <hr>
                @endforeach 
                {{$users->links()}}  


@include('layouts.popup')


                <!--   Each advisor section End-->
                

                <!--   Each advisor section start-->

               

                <!--   Each advisor section End-->




            </div>


            <!--            Request Proposal section Start-->

            <div class="col-md-12 col-lg-4">
<!-- 
                <div id="request-proposal">
                    <h3>Ready to hire a financial advisor?</h3>
                    <h4>Get competitive proposals from Danna Jacobs and other advisors.</h4>
                    <form action="">
                        <input type="text" class="form-control" placeholder="Search">
                        <input type="text" class="form-control" placeholder="City/State">
                        <input type="text" class="form-control" placeholder="Zip Code">
                        <input type="submit" class="btn btn-primary form-control" value="REQUEST PROPOSAL">
                    </form>
                </div> -->


            </div>
        </div>
    </div>
    <!--   content section end-->

    <!--    Main section End-->

    <!--...............................-->

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
                        <h4>401kdepot, 9th Floor,<br>
                            1765 Greensboro Station Place,<br>
                            McLean, VA 22102</h4>
                        <a href="#">(571) 766-8021</a>
                        <a href="#">info@401kdepot.com</a>
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
                    <p class="text-center">&copy; 2017 401kdepot, Inc. All Rights Reserved.</p>
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


<script>
$(document).ready(function(){

 $('#place').keyup(function(){ 
        var query = $(this).val();
        if(1)
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#placeList').fadeIn();  
                    $('#placeList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#place').val($(this).text());  
        $('#placeList').fadeOut();  
    });  

});
</script>