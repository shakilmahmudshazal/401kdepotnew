<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//require 'vendor/autoload.php'; 
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
define("AUTHORIZENET_LOG_FILE","phplog");
// use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //

    public function create()
    {
    	return view('transaction.makeTransaction');
    }

    public function result()
    {
    	return view('transaction.resultTransaction');
    }

    public function store()
    {
    	$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();   
  $merchantAuthentication->setName("4CPm79t8y");   
  $merchantAuthentication->setTransactionKey("39v7GA6ff8ERB9c7");   
  $refId = 'ref' . time();

// Create the payment data for a credit card
  $creditCard = new AnetAPI\CreditCardType();
  // $creditCard->setCardNumber("4111111111111111" );  
    $creditCard->setCardNumber(request('creditCard') );  

  // $creditCard->setExpirationDate( "2038-12");
      $creditCard->setExpirationDate(request('exp'));

  $paymentOne = new AnetAPI\PaymentType();
  $paymentOne->setCreditCard($creditCard);

// Create a transaction
  $transactionRequestType = new AnetAPI\TransactionRequestType();
  $transactionRequestType->setTransactionType("authCaptureTransaction");   
  $transactionRequestType->setAmount(151.51);
  $transactionRequestType->setPayment($paymentOne);
  $request = new AnetAPI\CreateTransactionRequest();
  $request->setMerchantAuthentication($merchantAuthentication);
  $request->setRefId( $refId);
  $request->setTransactionRequest($transactionRequestType);
  $controller = new AnetController\CreateTransactionController($request);
  $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);   

        $tid='';
        $tcode='';
        
if ($response != null) 
{
  $tresponse = $response->getTransactionResponse();
  if (($tresponse != null) && ($tresponse->getResponseCode()=="1"))
  {
//    echo "Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() . "\n";
      $tcode=$tresponse->getAuthCode();
//    echo "Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n";
      $tid=$tresponse->getTransId();
      $status='succesfull';
  }
  else
  {
//    echo "Charge Credit Card ERROR :  Invalid response\n";
       $status=' Not succesfull';
  }
}  
else
{
//  echo  "Charge Credit Card Null response returned";
     $status=' Charge Credit Card Null response returned';
}
         return view('transaction.resultTransaction',compact('status','tcode','tid'));



    }

     
}
