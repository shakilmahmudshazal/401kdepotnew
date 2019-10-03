<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quotationRequest;
use App\User;
use App\notificationUser;

use Redirect;



class QuotationRequestController extends Controller
{
    //
    public function __construct()
    {
       $this->middleware('auth');
       // ->except(['index','show','showall']);
    }

    public function show()
    {
    	$user=User::find(auth()->id());
    	if($user->role_id==2)
    	{
    		$quotationRequest=quotationRequest::orderBy('created_at', 'desc')->where('status_id',1)->get();
            // $quotationRequest=quotationRequest::all();
    	}
    	else
    	{
    		$quotationRequest=quotationRequest::orderBy('created_at', 'desc')->where('user_id',auth()->id())
                ->where('status_id',2)                                                                
                ->get();
    	}
    	return view('quotationRequest.quotationList',compact('quotationRequest','user'));
    }

    public function store(Request $request,$id)
    {
    	$this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'details' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
        ]);

        //$user= User::find($id);

         quotationRequest::create([
            'user_id'=>$id,
            'name'=>$request['name'],
            'subject'=>$request['subject'],
            'details'=>$request['details'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],


            'city'=>$request['city'],
            'state'=>$request['state'],
            
            'zipcode'=>$request['zipcode'],

         ]);

         


          return Redirect::back()->with('message','Operation Successful .');


    }

    public function showEditForm($id)
    {

        $request= quotationRequest::find($id);
        

        return view('quotationRequest.editQuotation',compact('request'));
    }

    public function edit($id)
    {
        $request= quotationRequest::find($id);
        $request->user_id=request('user_id');
        $request->subject=request('subject');
        $request->details=request('details');
        $request->name=request('name');
        $request->email=request('email');
        $request->phone=request('phone');
        $request->city=request('city');
        $request->state=request('state');
        $request->zipcode=request('zipcode');
        $request->save();

        return Redirect::back()->with('message','Operation Successful .');


    }

    public function approve($id)
    {
        $request= quotationRequest::find($id);
        $request->status_id=5;
        $request->save();

        $notification= notificationUser::create([
            'details'=> ' your request has been approved',
            'user_id'=>$request->user_id,
            'link'=>'/home'

        ]);

        return Redirect::back()->with('message','Operation Successful .');




    }
    public function sendToAdvisor($id)
    {
        $request= quotationRequest::find($id);
        $request->status_id=2;
        $request->save();

        $notification= notificationUser::create([
            'details'=> ' you have a new  request ',
            'user_id'=>$request->user_id,
            'link'=>'/home'

        ]);

        return Redirect::back()->with('message','Operation Successful .');




    }
    public function cancel($id)
    {
        $request= quotationRequest::find($id);
        $request->status_id=3;
        $request->save();

        return Redirect::back()->with('message','Operation Successful .');



    }
    public function cancelUser($id)
    {
        $request= quotationRequest::find($id);
        $request->status_id=4;
        $request->save();

        return Redirect::back()->with('message','Operation Successful .');



    }

    public function showNewRequest() 
    {
        $user= User::find(auth()->id());
        // return $user->quotationRequest;
        $quotationRequest= quotationRequest::orderBy('created_at', 'desc')
        ->where('user_id',auth()->id()) 
        ->get();

        return view('quotationRequest.advisor.newRequest',compact("user",'quotationRequest'));
        
    }
    public function showAllRequest() 
    {
        $user= User::find(auth()->id());
        // return $user->quotationRequest;
        $quotationRequest= quotationRequest::orderBy('created_at', 'desc')
        ->where('user_id',auth()->id()) 
        ->get();

        return view('quotationRequest.advisor.allRequest',compact("user",'quotationRequest'));
        
    }
    public function showPaidRequest() 
    {
        $user= User::find(auth()->id());
        // return $user->quotationRequest;
         $quotationRequest= quotationRequest::orderBy('created_at', 'desc')
        ->where('user_id',auth()->id()) 
        ->get();

        return view('quotationRequest.advisor.paidRequest',compact("user",'quotationRequest'));
        
    }

    public function showAllRequestAdmin()
    {
        $quotationRequest= quotationRequest::orderBy('created_at', 'desc')->get();

        return view('quotationRequest.admin.allRequest',compact('quotationRequest'));
    }
    public function showNewRequestAdmin()
    {
        $quotationRequest= quotationRequest::orderBy('created_at', 'desc')->where('status_id','1')->get();
        // return $quotationRequest;

        return view('quotationRequest.admin.newRequest',compact('quotationRequest'));
    }
    public function showPaidRequestAdmin()
    {
        $quotationRequest= quotationRequest::orderBy('created_at', 'desc')->get();

        return view('quotationRequest.admin.paidRequest',compact('quotationRequest'));
    }
    public function showEmptyRequestAdmin()
    {
        $quotationRequest= quotationRequest::orderBy('created_at', 'desc')->get();

        return view('quotationRequest.admin.emptyRequest',compact('quotationRequest'));
    } 


}
