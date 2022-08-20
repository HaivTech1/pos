<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Paystack;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
      return DataTables::of(Payment::get())->make(true);
    }

    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
 
        if (!$paymentDetails['status']) {
          // code...
          return response()->json(['status' => false, 'message' => $paymentDetails['message']]);
        }
 
        if ($paymentDetails['status']) {
          // code...
          $payment = Payment::where('status', 'pending')->where('author_id', auth()->user()->id)->latest();
 
          $payment->update([
            'status' => $paymentDetails['status'],
            'reference' => $paymentDetails['data']['reference'],
            'authorization_code' => $paymentDetails['data']['authorization']['authorization_code'],
            'currency_code' => $paymentDetails['data']['currency'],
            'payed_at' => NOW(),//$paymentDetails['data']['paidAt'],
          ]);
 
          // set due to undue
          \App\CollectionCommission::undue(explode(',', $paymentDetails['data']['metadata']['order_ids'] ));
        }
 
        return redirect('/payment/status')->with([
          'status' => $paymentDetails['status'],
          'message' => $paymentDetails['message'],
        ]);
 
        return response()->json(['status' => true, 'message' => $paymentDetails['message']]);
        // dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}