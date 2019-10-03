<?php

namespace App\Http\Controllers;
use App\User;
use App\userProfilePic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Str;


class UserProfilePicController extends Controller
{
    //
    public function __construct()
    {
       $this->middleware('auth');
       // ->except(['index','show','showall']);
    }

     public function create(){

        return view('user.editProfilePic');
    }

    public function save(Request $request){

        $this->validate($request,[
            
            'profile_pic'=>'required'
        ]);
        $profile_pic = $request->file('profile_pic');
        // $slug = str_slug($request->profile_name);
        // $slug = str_slug(auth()->id());
        if (isset($profile_pic)){
            $currentDate=Carbon::now()->toDateString();
            $picname= $currentDate.'-'.uniqid().'.'.
            $profile_pic->getClientOriginalExtension();

            $user= User::find(auth()->id());
            $user->userProfilePic->profile_pic=$picname;
            
            
            $user->userProfilePic->save();
            // $profile=userProfilePic::find(auth()->id());
            // // $profile->user_id=auth()->id();
            // $profile->profile_pic=$picname;
            // $profile->save();

            if (!file_exists('uploads/profilePic')){
                mkdir('uploads/profilePic',0777,true);
            }
            $profile_pic->move('uploads/profilePic',$picname);
        }
        else{
            $picname="default.png";
        }
         // $profile= new userProfilePic();
        // $profile->user_id=auth()->id();
        // $profile->profile_pic=$picname;
        // $profile->save();

        


       return redirect('/showProfile')->with('message','Operation Successful .');
    }
}
