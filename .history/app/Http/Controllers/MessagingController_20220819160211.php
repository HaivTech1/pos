<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Messaging;
use App\Http\Requests\StoreMessagingRequest;
use App\Http\Requests\UpdateMessagingRequest;

class MessagingController extends Controller
{
    public function indexEmail(){
        return view('manager.messaging.email',[
            'users' => User::where('type' ,'!=', 3)->get()
        ]);
    }

    public function sendEmail(Request $request){
        $user = \Auth::user();
  
        // return new \App\Mail\MailToMember($request, \Auth::user());
          foreach ($request->to as $to){
            Mail::to($to)//$request->to)
                //->cc($request->cc)
                //->bcc($request->bcc)
                ->send(new \App\Mail\MailToMember($request, $user));
                // ->send(new MailMember($request));
              }
          return redirect()->back()->with('status','Mail Successfully Sent!');
      }
}