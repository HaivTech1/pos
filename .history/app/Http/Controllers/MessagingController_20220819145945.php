<?php

namespace App\Http\Controllers;

use App\Models\Messaging;
use App\Http\Requests\StoreMessagingRequest;
use App\Http\Requests\UpdateMessagingRequest;

class MessagingController extends Controller
{
    public function indexEmail(){
        return view('manager.messaging.email',[
            'users' => User::where('type' '!=', 3)->get()
        ]);
      }
}