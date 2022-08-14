<?php

namespace App\Http\Livewire\Components\Cashier\Order;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Application;
use App\Models\Orderdetail;
use Livewire\WithPagination;
use App\Models\ProductCategory;

class Index extends Component
{
    use WithPagination;
    
    public $count = 4;
    public $cashierView = false;
    public $orders;
    public $product_code;
    public $message = '';
    public $productIncart;

    public $pay_money = '';
    public $balance = '';
    public $name = '';
    public $number = '';

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

    public function InsertToCart($productId)
    {

        if(!$this->cashierView){
            $countProduct = Product::where('uuid', $productId['uuid'])->first();
        }else{
            $countProduct = Product::where('product_code', $this->product_code)->first();

        }

        if (!$countProduct) {

            return session()->flash('info', 'Product Not Found');
        }

        $countCartProduct = Cart::where('product_id', $countProduct->id())->count();


        if ($countCartProduct > 0) {

            return session()->flash('error', 'Product ' . $countProduct->product_name . ' Already Exist in cart please add quantity!');
        }

        $add_to_cart = new Cart;
        $add_to_cart->product_id = $countProduct->id();
        $add_to_cart->qty = 1;
        $add_to_cart->price = $countProduct->price;
        $add_to_cart->authoredBy(auth()->user());
        $add_to_cart->save();

        $this->productIncart->prepend($add_to_cart);
        session()->flash('success', 'Product Added Successfully');
    }

    public function IncrementQty($cartId)
    {
        $carts = Cart::find($cartId);
        $carts->increment('qty', 1);
        $updatePrice = $carts->qty * $carts->product->price;
        $carts->update(['price' => $updatePrice]);
        $this->mount();
    }

    public function DecrementQty($cartId)
    {
        $carts = Cart::find($cartId);
        if ($carts->qty == 1) {

            return session()->flash('info', 'Product ' . $carts->product->product_name . ' quantity can not be less than 1. Add quantity or remove product from cart.');
        }
        $carts->decrement('qty', 1);
        $updatePrice = $carts->qty * $carts->product->price;
        $carts->update(['price' => $updatePrice]);
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
        return Product::when($this->category, function($query, $category) {
            $query->whereHas('category', function($query) use ($category){
               $query->where('id', $category);
            });
        })
        ->search(trim($this->search))->limit($this->count)->get();
    }

    public function updatedPayMoney($value)
    {
        $totalAmount = $this->pay_money - $this->productIncart->sum('price');
        $this->balance = $totalAmount;
    }

    public function render()
    {    
        return view('livewire.components.cashier.order.index', [
            'products' =>  $this->products,
            'application' => Application::first(),
            'categories' => ProductCategory::all()
        ]);
    }
}