<?php

namespace App\Http\Controllers;
use App\notificationAdmin;
use App\User;

use Illuminate\Http\Request;

class NotificationAdminController extends Controller
{
    //
    public function __construct()
    {
       $this->middleware('auth');
       // ->except(['index','show','showall']);
    }

    public function showAll()
    {
    	$notification= notificationAdmin::all();
    	$user= User::find(auth()->id());

    	// return $notification;
    	return view('notification.notificationAdmin',compact('notification','user'));
    }
}
