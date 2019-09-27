<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationUserController extends Controller
{
    //
    public function show()
    {
    	$user= \App\User::find(auth()->id());
    	return view('notification.notification',compact('user'));
    }
}
