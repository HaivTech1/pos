<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Jobs\CreateProduct;
use App\Jobs\UpdateProduct;
use App\Models\ProductCategory;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manager.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all()->pluck('name', 'id');
        $brands = Brand::all()->pluck('title', 'id');
        return view('manager.product.create', compact(['categories', 'brands']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // dd($request);
        $this->dispatchSync(CreateProduct::fromRequest($request));

        $notification = array(
            'messege' => 'Product created successfully',
            'alert-type' => 'success',
            'title' => 'Successful!',
            'button' => 'Thanks, operation successful!',
        );
        
        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('manager.product.show', compact(['product']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all()->pluck('name', 'id');
        $brands = Brand::all()->pluck('title', 'id');
        return view('manager.product.edit', compact(['product', 'categories', 'brands']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->dispatchSync(UpdateProduct::fromRequest($product, $request));

        $notification = array(
            'messege' => 'Product updated successfully',
            'alert-type' => 'success',
            'title' => 'Successful!',
            'button' => 'Thanks, the operation was successful!',
        );

        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}