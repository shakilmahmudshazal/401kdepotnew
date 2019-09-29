<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationUserController extends Controller
{
    //

    public function __construct()
    {
       $this->middleware('auth');
       // ->except(['index','show','showall']);
    }
    
    public function show()
    {
    	$user= \App\User::find(auth()->id());
    	return view('notification.notification',compact('user'));
    }
}
