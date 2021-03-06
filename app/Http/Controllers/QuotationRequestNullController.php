<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quotationRequest;
use App\credit;
use App\User;
use Redirect;
use DB;
use App\Mail\quotationRequestAccepted;
class QuotationRequestNullController extends Controller
{
    //
    public function __construct()
    {
       $this->middleware('auth')
        ->except(['create','store','showall']);
    }

    public function create()
    {
        return view('quotationRequest.submitRequest');
    }
    public function store(Request $request)
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

         $quotationRequest=quotationRequest::create([
            
            'name'=>$request['name'],
            'subject'=>$request['subject'],
            'details'=>$request['details'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],


            'city'=>$request['city'],
            'state'=>$request['state'],
            
            'zipcode'=>$request['zipcode'],

         ]);
         \Mail::to($quotationRequest->email)->send(new quotationRequestAccepted($quotationRequest));

         // $status='operation successful';

         


          return Redirect::back()->with('message','Your request has been sent successfully');


    }

    public function showAssignForm($id)  
    {
        $request= quotationRequest::find($id);
        return view('quotationRequest.assignUser',compact('request'));
    }

    public function assignUser($id)
    {
        $request= quotationRequest::find($id);
        $request->user_id=request('user_id');
        
        $request->save();
        $user=User::find(request('user_id'));


        if(empty($user->credit->credit))
        {
            credit::create([
                'user_id'=>request('user_id')

            ]);
        }
        $id=DB::table('credits')->where('user_id',request('user_id'))->first()->id;

        $credit= credit::find($id);
        $credit->credit= $credit->credit -1;
        $credit->save();

        return Redirect::back()->with('message','Operation successful.');


    }


}
