
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