<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quotationRequest;
use App\invoice;

class InvoiceController extends Controller
{
    //

    public function __construct()
    {
       $this->middleware('auth');
       // ->except(['index','show','showall']);
    }

    public function create($id)
    {
    	# code...

    	$quotation= quotationRequest::find($id);
    	return view('invoice.createInvoice',compact('quotation'));
    }


    public function store(Request $request,$id)
    {
    	# code...
    	$this->validate($request,[
            'amount' => 'required',
            'issueDate' => 'required',
            'dueDate' => 'required',
            
        ]);

        //$user= User::find($id);
        $quotation= quotationRequest::find($id);

        if(empty($quotation->invoice))
        {
            $invoice= invoice::create([
            'quotation_request_id'=>$id,
            'amount'=>$request['amount'],
            'issueDate'=>$request['issueDate'],
            'dueDate'=>$request['dueDate'],
            

         ]);
        }
        else
        {
            $quotation->invoice->amount=$request['amount'];
            $quotation->invoice->issueDate=$request['issueDate'];
             $quotation->invoice->dueDate=$request['dueDate'];
             $quotation->invoice->save();



        }

         

         return redirect('/showInvoice/'.$invoice->id)->with('message','Operation Successful .');

    }

    public function show($id)
    {

    	$invoice=invoice::find($id);

    	return view("invoice.showInvoice",compact("invoice"));

    	# code...
    }
    
}
