<?php

namespace App\Http\Livewire\Components\Cashier\Order;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Application;
use App\Models\Orderdetail;
use App\Models\ProductCategory;

class Index extends Component
{
    public $cashierView = false;
    public $orders;
    public $prodoct_code;
    public $message = '';
    public $productIncart;

    public $pay_money = '';
    public $balance = '';
    public $search;
    public $sort;
    public $category;
    public $discount;
    public $histories;
    
    public function updatedCashierView($value)
    {
        $this->cashierView = $value;
    }

    public function mount()
    {
        $this->productIncart = Cart::where('author_id', auth()->id())->get();
        $this->histories = Orderdetail::where('created_at', date('d-m-Y'))->latest()->limit(5)->get();
    }

    public function InsertBarcodeToCart()
    {
        $countProduct = Product::where('product_code', $this->prodoct_code)->first();

        if (!$countProduct) {

            return session()->flash('info', 'Product Not Found');
        }

        $countCartProduct = Cart::where('product_id', $countProduct->id)->count();


        if ($countCartProduct > 0) {

            return session()->flash('error', 'Product ' . $countProduct->product_name . ' Already Exist in cart please add quantity!');
        }
        $add_to_cart = new Cart;
        $add_to_cart->product_id = $countProduct->id;
        $add_to_cart->product_qty = 1;
        $add_to_cart->product_price = $countProduct->price;
        $add_to_cart->user_id = auth()->user()->id;
        $add_to_cart->save();

        $this->productIncart->prepend($add_to_cart);
        $this->prodoct_code = '';
        session()->flash('success', 'Product Added Successfully');
    }

    public function InsertManualToCart($productId)
    {

        dd($productId);
        $countProduct = Product::where('id', $productId)->first();

        if (!$countProduct) {

            return session()->flash('info', 'Product Not Found');
        }

        $countCartProduct = Cart::where('product_id', $countProduct->id)->count();


        if ($countCartProduct > 0) {

            return session()->flash('error', 'Product ' . $countProduct->product_name . ' Already Exist in cart please add quantity!');
        }
        $add_to_cart = new Cart;
        $add_to_cart->product_id = $countProduct->id;
        $add_to_cart->product_qty = 1;
        $add_to_cart->product_price = $countProduct->price;
        $add_to_cart->user_id = auth()->user()->id;
        $add_to_cart->save();

        $this->productIncart->prepend($add_to_cart);
        $this->prodoct_code = '';
        session()->flash('success', 'Product Added Successfully');
    }

    public function IncrementQty($cartId)
    {
        $carts = Cart::find($cartId);
        $carts->increment('product_qty', 1);
        $updatePrice = $carts->product_qty * $carts->product->price;
        $carts->update(['product_price' => $updatePrice]);
        $this->mount();
    }

    public function DecrementQty($cartId)
    {
        $carts = Cart::find($cartId);
        if ($carts->product_qty == 1) {

            return session()->flash('info', 'Product ' . $carts->product->product_name . ' quantity can not be less than 1. Add quantity or remove product from cart.');
        }
        $carts->decrement('product_qty', 1);
        $updatePrice = $carts->product_qty * $carts->product->price;
        $carts->update(['product_price' => $updatePrice]);
        $this->mount();
    }

    public function removeProduct($cartId)
    {
        $deleteCart = Cart::find($cartId);
        $deleteCart->delete();

        session()->flash('info', 'Product Removed from Cart');

        $this->productIncart = $this->productIncart->except($cartId);
    }

    public function getProductsProperty()
    {
        return Product::search(trim($this->search))->get();
    }

    public function render()
    {

        if ($this->pay_money != '') {

            $totalAmount = $this->pay_money - $this->productIncart->sum('price');
            $this->balance = $totalAmount;
        }
            
        return view('livewire.components.cashier.order.index', [
            'products' =>  $this->products,
            'application' => Application::first(),
            'categories' => ProductCategory::all()
        ]);
    }
}