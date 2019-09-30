<?php

namespace App\Http\Controllers;
use App\User;
use App\userBasic;
use App\userProfilePic;
use App\verifyUser;
use App\userService;
use App\userServiceRelation;
use App\userEducation;
use App\userFinancialExam;
use App\userProfessionalDesignation;
use App\userWork;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //

      public function __construct()
    {
       $this->middleware('auth');
       // ->except(['index','show','showall']);
    }
       
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string','max:255', 'unique:user_basics'],
            'city'=>['required'],
            'state'=>['required'],
            'zipcode'=>['required','integer','min:4']
        ]);
    }


    public function logout()
    {
    	auth()->logout();
    	return redirect()->home();
    }

    public function showProfile()

   {
    $userEducation = userEducation::get();//imran
    $userFinancialExam = userFinancialExam::get();//imran
    $userProfessionalDesignation = userProfessionalDesignation::get();//imran
    $userWork = userWork::get();//imran
   	$user = User::find(auth()->id());
    $userService = userService::all();
    $services = userServiceRelation::where('user_id',auth()->id())->get();
   	return view('user.userProfile',compact('user','services','userService'.'','userEducation','userFinancialExam','userProfessionalDesignation','userWork'));

    }
    public function editProfile()

   {
    $userEducation = userEducation::get();//imran
    $userFinancialExam = userFinancialExam::get();//imran
    $userProfessionalDesignation = userProfessionalDesignation::get();//imran
    $userWork = userWork::get();//imran

    // print_r($userEducation);
    // exit();

    $user = User::find(auth()->id());
    $userService = userService::all();
    //$userServiceRelation = userServiceRelation::all();

    return view('user.editProfile',compact('user','userService','userEducation','userFinancialExam','userProfessionalDesignation','userWork'));

    }
    public function updateProfile()

   {

    $user= User::find(auth()->id());
    
    if(empty($user->userBasic))
    {
        userBasic::create([
            'user_id'=> $user->id,
            'username'=>request('username'),


        ]);
        
    }
    if(empty($user->userDetails)) 
    {
        
        userDetails::create([
            'user_id'=>$user->id,
            

         ]);

         
    }
    if(empty($userProfilePic) )
    {
        

         userProfilePic::create([
            'user_id'=>$user->id

         ]);
    }
    $user->userBasic->website=request('website');
     $user->userBasic->compensationModel=request('compensationModel');
    $user->userBasic->phone=request('phone');
    $user->userBasic->city=request('city');
    $user->userBasic->state=request('state');
    $user->userBasic->zipcode=request('zipcode');

    $user->userBasic->username=request('username');
    
    $user->userBasic->firm=request('firm');
    $user->userBasic->firmWebsite=request('firmWebsite');
    $user->userBasic->dob=request('dob');
    $user->userBasic->crdNumber=request('crdNumber');
    $user->userBasic->firmWebsite=request('firmWebsite');
    $user->userDetails->details=request('details');
    $user->userDetails->pricingModel=request('pricingModel');

    $user->userDetails->planningProcess=request('planningProcess');
    $user->userDetails->save();

    
    $user->userBasic->save();

    userServiceRelation::where('user_id',$user->id)->delete();



    $services = request('services');
    if(!empty($services))
    {
      foreach($services as $service){
        userServiceRelation::create([
          'user_id'=> $user->id,
           'user_service_id'=> $service

        ]);

    }
    


             }


    return redirect('/showProfile');

    }

    public function allUserList()
    {
        $users=User::all();
        return view('user.allUserList',compact("users"));
    }

}
