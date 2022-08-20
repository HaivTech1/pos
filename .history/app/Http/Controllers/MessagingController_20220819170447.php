<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Messaging;
use Illuminate\Http\Request;
use App\Mail\Messaging\SendMail;
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
  
          foreach ($request->to as $to){
            Mail::to($to)
                ->send(new SendMail($request, $user));
        }

        $notification = array (
            'messege' => 'Email sent successfully',
            'alert-type' => 'success',
            'button' => 'Okay!',
            'title' => 'Success'
        );

          return redirect()->back()->with($notification);
    }

    public function indexSMS(){
        $user = \Auth::user();
        $groups =\App\Group::where('branch_id', $user->id)->get();
        $members = \App\Member::where('branch_id', $user->id)->get(); //$user->isAdmin() ? \App\Member::all() :
        $group = collect(new \App\Group);
        $group->name = 'First Timers Group';
        $group->id = 1000;
        $default_groups = [];
        // get the sms api
        $smsapi = \App\Options::getOneBranchOption('smsapi', $user);
        array_push($default_groups, $group);
        return view('messaging.sms', compact('members', 'groups', 'default_groups', 'smsapi'));
      }
}