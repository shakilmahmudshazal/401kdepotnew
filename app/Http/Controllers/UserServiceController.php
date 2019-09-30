<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userService;

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

    	return redirect()->back();

    }
}
