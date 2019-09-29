<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quotationRequest;
use App\credit;
use Redirect;
use DB;

class QuotationRequestNullController extends Controller
{
    //
    public function __construct()
    {
       $this->middleware('auth');
       // ->except(['index','show','showall']);
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

         quotationRequest::create([
            
            'name'=>$request['name'],
            'subject'=>$request['subject'],
            'details'=>$request['details'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],


            'city'=>$request['city'],
            'state'=>$request['state'],
            
            'zipcode'=>$request['zipcode'],

         ]);

         


          return Redirect::back()->with('message','Operation Successful !');


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

        $id=DB::table('credits')->where('user_id',request('user_id'))->first()->id;

        $credit= credit::find($id);
        $credit->credit= $credit->credit -1;
        $credit->save();

        return Redirect::back()->with('message','Successful');


    }


}
