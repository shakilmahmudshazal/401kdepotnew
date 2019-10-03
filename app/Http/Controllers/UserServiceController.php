<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userService;
use App\userServiceRelation;

class UserServiceController extends Controller
{
    //
    public function index()
    {
    	$service=userService::all();
    	return view('service.addService',compact('service'));
    }
    
    public function add()
    {
    	$service=userService::create([
    		'name'=>request('name')

    	]);

    	return redirect()->back()->with('message','Operation Successful .');

    }

    public function delete($id)
    {
               $service=userService::find($id);
                $service->delete();

                $userService= userServiceRelation::where('user_service_id',$id)->delete();



                return redirect('/addService')->with('message','Operation Successful .'); 

      
    }
}
