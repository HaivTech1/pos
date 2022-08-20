<?php

namespace App\Http\Controllers;

use App\Models\Messaging;
use App\Http\Requests\StoreMessagingRequest;
use App\Http\Requests\UpdateMessagingRequest;

class MessagingController extends Controller
{
    public function indexEmail(){
        $group->id = 1000;
        $default_groups = [];
        array_push($default_groups, $group);
        return view('messaging.email', compact('members', 'groups', 'default_groups'));
      }
}