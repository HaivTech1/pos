<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Jobs\CreateSupplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'manager']);
    }

    public function index()
    {
        return view('manager.supplier.index');
    }


    public function store(StoreSupplierRequest $request)
    {
        $this->dispatchSync(CreateSupplier::fromRequest($request));
        return response()->json(['success' => true, 'message' => 'Supplier created successfully!']);
    }
}