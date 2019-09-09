<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\verifyUser;
use App\Mail\emailConfirmation;

class VerifyUserController extends Controller
{
    //
            public function verifyEmail($token)
        {
          $verifyEmail = verifyUser::where('token', $token)->first();
          if(isset($verifyEmail) ){
            $user = $verifyEmail->user;
            if(!$verifyEmail->user->email_verified) {
              $verifyEmail->user->email_verified = 1;
              $verifyEmail->user->save();
              $status = "Your e-mail is verified. You can now login.";
            } else {
              $status = "Your e-mail is already verified. You can now login.";
            }
          } else {
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
          }
          return redirect('/login')->with('status', $status);
        }
}
