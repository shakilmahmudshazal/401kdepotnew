<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quotationRequest;
use Redirect;

class QuotationRequestNullController extends Controller
{
    //
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


}
