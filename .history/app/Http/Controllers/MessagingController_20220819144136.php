<?php

namespace App\Http\Controllers;

use App\Models\Messaging;
use App\Http\Requests\StoreMessagingRequest;
use App\Http\Requests\UpdateMessagingRequest;

class MessagingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessagingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessagingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Messaging  $messaging
     * @return \Illuminate\Http\Response
     */
    public function show(Messaging $messaging)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Messaging  $messaging
     * @return \Illuminate\Http\Response
     */
    public function edit(Messaging $messaging)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessagingRequest  $request
     * @param  \App\Models\Messaging  $messaging
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessagingRequest $request, Messaging $messaging)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Messaging  $messaging
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messaging $messaging)
    {
        //
    }
}
