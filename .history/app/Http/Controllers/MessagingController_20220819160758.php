<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SendMail;
use App\Models\Messaging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagingController extends Controller
{
    public function indexEmail(){
        return view('manager.messaging.email',[
            'users' => User::where('type' ,'!=', 3)->get()
        ]);
    }

    public function sendEmail(Request $request){
        // dd($request);
        $user = \Auth::user();
  
        // return new \App\Mail\MailToMember($request, \Auth::user());
          foreach ($request->to as $to){
            Mail::to($to)//$request->to)
                //->cc($request->cc)
                //->bcc($request->bcc)
                ->send(new SendMail($request, $user));
                // ->send(new MailMember($request));
              }
          return redirect()->back()->with('status','Mail Successfully Sent!');
      }
}