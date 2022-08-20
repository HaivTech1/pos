<?php

namespace App\Http\Controllers;

use App\Models\Messaging;
use App\Http\Requests\StoreMessagingRequest;
use App\Http\Requests\UpdateMessagingRequest;

class MessagingController extends Controller
{
    public function indexEmail(){
        $user = \Auth::user();
        $groups =\App\Group::where('branch_id', $user->id)->get();
        $members = \App\Member::where('branch_id', $user->id)->get(); //$user->isAdmin() ? \App\Member::all() :
        $group = collect(new \App\Group);
        $group->name = 'First Timers Group';
        $group->id = 1000;
        $default_groups = [];
        array_push($default_groups, $group);
        return view('messaging.email', compact('members', 'groups', 'default_groups'));
      }
}