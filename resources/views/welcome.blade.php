<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>401k Depot</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

</head>

<body>


    <header>

        @include('layouts.navbar')

    </header>
    <section id="home">
        <div class="content">
            <h1 class="text-center text-white">Plan wisely. Live fully.</h1>
            <h4 class="text-center text-white">Find and connect with the right financial advisor for you.</h4><br>
        </div>
        <div class="advisor-heaing">
            <p>Browse Advisors</p>
        </div>

        <div class="browse-advisor">
            <div class="container">
                <form class="form-view" method="get" action="/search">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <input type="text" class="form-control" placeholder="Search" name="service">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="text" class="form-control" placeholder="City/State" id="place" name="place">
                            <div id="placeList"></div>
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="submit" class="form-control btn btn-success" id="submit" value="SEARCH" name="email">
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </section>


    <!--    pop-up sign up Start-->


    <div class="modal fade" id="mySignUpModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="background-color: white">
                <div class="modal-header">
                    <div style="margin: 10px;width: 100%;">
                        <p class="text-center" style="font-size: 32px;color: #18212E; font-weight: bolder">Sign Up</p>
                    </div>

                    <button type="button" class="close" data-dismiss="modal" style="font-size: 52px; color: #b4bac4;margin-top: -4px;">&times;</button>

                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-section">
                            <div class="form-group">
                                <input type="text" style="border: none; border-radius: 0; background-color: #F0F0F0; color: black" class="form-control" name="name" placeholder="Your name">
                            </div>
                        </div>
                        <div class="input-section">
                            <div class="form-group">
                                <input type="text" style="border: none; border-radius: 0; background-color: #F0F0F0; color: black" class="form-control" name="username" placeholder=" username">
                            </div>
                        </div>
                        <div class="input-section">
                            <div class="form-group">
                                <input type="email" style="border: none; border-radius: 0; background-color: #F0F0F0; color: black" class="form-control" name="email" placeholder="Email address">
                            </div>
                        </div>
                        <div class="input-section">
                            <div class="form-group">
                                <input type="text" style="border: none; border-radius: 0; background-color: #F0F0F0; color: black" class="form-control" name="city" placeholder=" city">
                            </div>
                        </div>
                        <div class="input-section">
                            <div class="form-group">
                                <input type="text" style="border: none; border-radius: 0; background-color: #F0F0F0; color: black" class="form-control" name="state" placeholder=" State">
                            </div>
                        </div>
                        <div class="input-section">
                            <div class="form-group">
                                <input type="text" style="border: none; border-radius: 0; background-color: #F0F0F0; color: black" class="form-control" name="zipcode" placeholder=" zipcode">
                            </div>
                        </div>
                        <div class="input-section">
                            <div class="form-group">
                                <input type="password" style="border: none; border-radius: 0; background-color: #F0F0F0; color: black" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="input-section">
                            <div class="form-group">
                                <input type="password" style="border: none; border-radius: 0; background-color: #F0F0F0; color: black" class="form-control" id="password-confirm"name="password_confirmation" placeholder="Confirm Password">
                            </div>
                        </div>

                        <p class="text-center" style="color: #6C757D">Already member? <a href="#" style="color: blue" data-toggle="modal" data-target="#myLoginModal" data-dismiss="modal">Log in</a></p>


                        <div class="form-group">
                            <input style="font-size: 14px;border: none;border-radius: 0;" type="submit" name="sign_up" value="Sign Up" class="btn btn-success form-control">
                        </div>

                        <p class="text-center" style="color: #6C757D">Or Sing up with</p>

                        <div class="form-group">
                            <div class="btn-group" style="width: 100%; ">
                                <a href="#" class="btn btn-primary" style="width: 50%;font-size: 14px; border: none;border-radius: 0;"><i class="fa fa-facebook-official"></i> Facebook</a>
                                <a href="#" class="btn btn-danger" style="width: 50%;font-size: 14px; border: none;border-radius: 0;"><i class="fa fa-envelope"></i> Gmail</a>
                            </div>
                        </div>


                    </form>

                </div>

            </div>

        </div>
    </div>

    <!--    pop-up sign up End-->

    <!--    .........................................-->
    <!--    pop-up Login Start-->

    <div class="modal fade" id="myLoginModal" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content" style="background-color: white">
                <div class="modal-header">
                    <div style="margin: 10px;width: 100%;">
                        <p class="text-center" style="font-size: 32px;color: #18212E; font-weight: bolder">Log in</p>
                    </div>

                    <button type="button" class="close" data-dismiss="modal" style="font-size: 52px; color: #b4bac4;margin-top: -4px;">&times;</button>

                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <input style="border: none; border-radius: 0; background-color: #F0F0F0; color: black" type="text" name="email" class="form-control" placeholder="Email address or phone">
                        </div>
                        <div class="form-group">
                            <input style="border: none; border-radius: 0; background-color: #F0F0F0; color: black" type="password" name="password" class="form-control" placeholder="Password">
                        </div>

                        <p class="text-center" style="color: #6C757D">Haven't any account? <a style="color: blue" href="#" data-toggle="modal" data-target="#mySignUpModal" data-dismiss="modal">Sign Up</a></p>
                        <div class="form-group">
                            <input style="font-size: 14px;border: none;border-radius: 0;" type="submit" name="login" value="Log in" class="btn btn-success form-control">
                        </div>

                        <p class="text-center" style="color: #6C757D">Or log in with</p>

                        <div class="form-group">
                            <div class="btn-group" style="width: 100%; ">
                                <a href="#" class="btn btn-primary" style="width: 50%;font-size: 14px; border: none;border-radius: 0;"><i class="fa fa-facebook-official"></i> Facebook</a>
                                <a href="#" class="btn btn-danger" style="width: 50%;font-size: 14px; border: none;border-radius: 0;"><i class="fa fa-envelope"></i> Gmail</a>
                            </div>
                        </div>



                    </form>

                </div>

            </div>

        </div>
    </div>
    <!--    pop-up log in End-->

    <!--    .........................................-->


    <!-- slider section start-->


    <div id="mySlider" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#mySlider" data-slide-to="0" class="active"></li>
            <li data-target="#mySlider" data-slide-to="1"></li>
            <li data-target="#mySlider" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <h1>Why is hiring a financial advisor a smart investment?</h1>
                            <h3>Because 1.3 million people will file for bankruptcy next year due to unforseen tragedies. Will you be one of them?</h3>
                            <a href="" class="btn btn-success">CHECK TO FIND OUT</a>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <img src="{{asset('images/homepage-carousel-insurance.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <h1>Why is hiring a financial advisor a smart investment?</h1>
                            <h3>Because 1.3 million people will file for bankruptcy next year due to unforseen tragedies. Will you be one of them?</h3>
                            <a href="#" class="btn btn-success">CHECK TO FIND OUT</a>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <img src="{{asset('images/homepage-carousel-investment.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <h1>Why is hiring a financial advisor a smart investment?</h1>
                            <h3 class="text-justify">Because 1.3 million people will file for bankruptcy next year due to unforseen tragedies. Will you be one of them?</h3>
                            <a href="" class="btn btn-success">CHECK TO FIND OUT</a>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <img src="{{asset('images/homepage-carousel-selfdirected.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Slider section End-->

    <!--
    ...................................
    ..........................
-->





    <!--    category section start-->

    <section id="category">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 cat-item">
                    <h1 class="text-center">FINANCIAL PLANNING</h1>
                    <hr>
                    <p class="text-center">Retirement Planning<br>
                        Major Purchases or Life Events<br>
                        Education Funding/Planning<br>
                        Budgeting and Saving<br>
                        Debt Reduction
                    </p>

                    <a class="btn btn-success form-control" data-toggle="modal" data-target="#myFinancialModal">LEARN MORE</a>
                    <a class="btn btn-success form-control" href="#">FIND A FINANCIAL PLANNER</a>

                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 cat-item">
                    <h1 class="text-center">INVESTMENT MANAGEMENT</h1>
                    <hr>
                    <p class="text-center">Portfolio Review<br>
                        Asset Allocation<br>
                        Asset Location<br>
                        401k Advice
                    </p>

                    <a class="btn btn-success form-control" data-toggle="modal" data-target="#myInvesmentModal">LEARN MORE</a>
                    <a class="btn btn-success form-control" href="#">FIND A INVESTMENT MANAGER</a>

                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 cat-item">
                    <h1 class="text-center">RISK MANAGEMENT</h1>
                    <hr>
                    <p class="text-center">Insurance Planning<br>
                        Income Protection<br>
                        Income Replacement<br>
                        Risk Identification and Mitigation
                    </p>

                    <a class="btn btn-success form-control" data-toggle="modal" data-target="#myRiskModal">LEARN MORE</a>
                    <a class="btn btn-success form-control">FIND A RISK MANAGER</a>

                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 cat-item">
                    <h1 class="text-center">ESTATE AND TAX PLANNING</h1>
                    <hr>
                    <p class="text-center">Wealth Preservation<br>
                        Asset Transfer<br>
                        Charitable Giving<br>
                        Tax-loss Harvesting
                    </p>

                    <a class="btn btn-success form-control" data-toggle="modal" data-target="#myTaxModal">LEARN MORE</a>
                    <a class="btn btn-success form-control" href="#">FIND A FINANCIAL ADVISORS</a>

                </div>

            </div>
        </div>


        <!--    Category Modal Start-->

        <!--            Financial Modal-->
        <div class="modal fade" id="myFinancialModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">FINANCIAL PLANNER</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Financial Planning is the process through which an advisor helps you understand your financial goals and what steps are necessary to reach them. Financial Planning answers questions like:</p>
                        <ul>
                            <li>How much do I need to save to support my income needs when I retire?</li>
                            <li>When should I begin taking my social security benefit?</li>
                            <li>Should I put money into my 401k or my child’s college fund?</li>
                        </ul>
                        <a class="btn btn-success form-control" href="#">FIND A FINANCIAL PLANNER</a>
                    </div>

                </div>
            </div>
        </div>
        <!--     Financial Modal End-->

        <!--   Investment maneger Start-->

        <div class="modal fade" id="myInvesmentModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">INVESTMENT MANAGER</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>
                            Investment Management is a set of tasks advisors perform to help you keep the investments you own in line with your overall financial objectives. Investment Management services help you know:
                        </p>

                        <ul>
                            <li>Are my investments appropriate for my goals?</li>
                            <li>What changes should I make to my current portfolio?</li>
                            <li>Am I adequately diversified across asset classes and industries?</li>
                            <li>Am I paying too much in investment costs?</li>
                        </ul>
                        <a class="btn btn-success form-control" href="#">FIND A INVESTMENT MANAGER</a>
                    </div>

                </div>
            </div>
        </div>

        <!--   Investment maneger End-->

        <!--   Risk magnage ment Start-->
        <div class="modal fade" id="myRiskModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>
                            Investment Management is a set of tasks advisors perform to help you keep the investments you own in line with your overall financial objectives. Investment Management services help you know:
                        </p>

                        <ul>
                            <li>Are my investments appropriate for my goals?</li>
                            <li>What changes should I make to my current portfolio?</li>
                            <li>Am I adequately diversified across asset classes and industries?</li>
                            <li>Am I paying too much in investment costs?</li>
                        </ul>
                        <a class="btn btn-success form-control" href="#">FIND A RISK MANAGER</a>
                    </div>

                </div>
            </div>
        </div>
        <!--   Risk management End-->

        <!--   Estate and tax Start-->

        <div class="modal fade" id="myTaxModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>
                            Investment Management is a set of tasks advisors perform to help you keep the investments you own in line with your overall financial objectives. Investment Management services help you know:
                        </p>

                        <ul>
                            <li>Are my investments appropriate for my goals?</li>
                            <li>What changes should I make to my current portfolio?</li>
                            <li>Am I adequately diversified across asset classes and industries?</li>
                            <li>Am I paying too much in investment costs?</li>
                        </ul>
                        <a class="btn btn-success form-control" href="#">FIND A FINANCIAL ADVISORS</a>
                    </div>

                </div>
            </div>
        </div>


        <!--   Estate and tax End-->





        <!--   Category Modal End-->
    </section>
    <!--
    .............................
    category section End
    .............................
    -->


    <!--    Testimonial section Start-->


    <section id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="testimonial-content">
                        <div class="content-background">
                            <img src="{{asset('images/homepage-testimonial-bg.png')}}" class="" alt="">
                            <div class="data">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="{{asset('images/homepage-testimonial01.png')}}" alt="">
                                    </div>
                                    <div class="col-6">
                                        <h3 class="">Name</h3>
                                        <p>Fort Lauderdale</p>
                                    </div>
                                </div>
                            </div>
                            <div class="content-details">
                                <p class="text-justify" style="font-family: lato;">Our goal is to retire early and have the freedom to travel. Wealthminder made it easy for us to find the perfect advisor for our situation.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="testimonial-content">
                        <div class="content-background">
                            <img src="{{asset('images/homepage-testimonial-bg.png')}}" class="" alt="">
                            <div class="data">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="{{asset('images/homepage-testimonial02.png')}}" alt="">
                                    </div>
                                    <div class="col-6">
                                        <h3 class="">Name</h3>
                                        <p>Fort Lauderdale</p>
                                    </div>
                                </div>
                            </div>
                            <div class="content-details">
                                <p class="text-justify" style="font-family: lato;">Our goal is to retire early and have the freedom to travel. Wealthminder made it easy for us to find the perfect advisor for our situation.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="testimonial-content">
                        <div class="content-background">
                            <img src="{{asset('images/homepage-testimonial-bg.png')}}" class="" alt="">
                            <div class="data">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="{{asset('images/homepage-testimonial03.png')}}" alt="">
                                    </div>
                                    <div class="col-6">
                                        <h3 class="">Name</h3>
                                        <p>Fort Lauderdale</p>
                                    </div>
                                </div>
                            </div>
                            <div class="content-details">
                                <p class="text-justify" style="font-family: lato;">Our goal is to retire early and have the freedom to travel. Wealthminder made it easy for us to find the perfect advisor for our situation.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--    Testimonial section End-->

    <!--    ..............................-->

    <!--    Brand section Start-->

    <section id="brand">
        <div class="container">
            <h4 class="text-center">We have matched thousands of clients with <br> advisors, and the press is starting to take notice.</h4>
            <div class="row">
                <div class="col-md-3"><img src="{{asset('images/logo-newsweek-white.png')}}" alt=""></div>
                <div class="col-md-3"><img src="{{asset('images/logo-reuters-white.png')}}" alt=""></div>
                <div class="col-md-3"><img src="{{asset('images/logo-yahoo-finance-white.png')}}" alt=""></div>
                <div class="col-md-3"><img src="{{asset('images/logos-huffington-post-white.png')}}" alt=""></div>
            </div>
        </div>
    </section>
    <!--    Brand section End -->

    <!--    ............................-->

    <!--    Features Section Start-->

    <section id="cities">
        <div class="container">
            <p class="text-center">FEATURED CITIES</p>
            <p class="text-center">
                <a href="#">Los Angeles</a> |
                <a href="#">Los Angeles</a> |
                <a href="#">Los Angeles</a> |
                <a href="#">Los Angeles</a> |
                <a href="#">Los Angeles</a> |
                <a href="#">Los Angeles</a> |
                <a href="#">Los Angeles</a> |
                <a href="#">Los Angeles</a> |
                <a href="#">Los Angeles</a> |
                <a href="#">Los Angeles</a> |
                <a href="#">Los Angeles</a></p>
        </div>
    </section>


    <!--    Features section End -->

    <!--    ............................-->

    <!--    Footer Section Start-->

   @include('layouts.footer')



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