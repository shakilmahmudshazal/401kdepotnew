<?php

namespace App\Http\Controllers;
use App\User;
use App\quotationRequest;
use App\notificationAdmin;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user= User::find(auth()->id());


        if ($user->role_id==2) {
            $quotationRequest= quotationRequest::paginate(1);
            $notification= notificationAdmin::paginate(5);
            return view('homeAdmin',compact("user",'quotationRequest','notification'));
            
        } else {
            $quotationRequest= quotationRequest::where('user_id',$user->id)
            ->where('status_id','>','1')
            ->paginate(1);
            return view('home',compact("user",'quotationRequest'));
        }
        




        
    }
}
