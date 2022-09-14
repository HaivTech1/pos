<?php

namespace App\Http\Livewire\Components\Cashier\Order;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Models\Application;
use App\Models\Orderdetail;
use Livewire\WithPagination;
use App\Models\ProductCategory;
use Picqer;

class Index extends Component
{
    use WithPagination;
    
    public $count = 4;
    public $cashierView = false;
    public $orders;
    public $product_code;
    public $message = '';
    public $productIncart = [];

    public $pay_money = '';
    public $balance = '';
    public $name = '';
    public $phone = '';
    public $method = '';

    public $search;
    public $sort;
    public $category;
    public $discount;

    public $order_receipt = [];
    
    public function updatedCashierView($value)
    {
        $this->cashierView = $value;
    }

    public function mount()
    {
        $this->productIncart = Cart::where('author_id', auth()->id())->get();

        $lastID = Order::latest()->first();
        $order_receipt = $lastID ? $lastID->orderdetail : [];
        $this->order_receipt = $order_receipt;
    }

    public function InsertToCart($productId)
    {

        if(!$this->cashierView){
            $countProduct = Product::where('uuid', $productId['uuid'])->first();
        }else{
            $countProduct = Product::where('code', $this->product_code)->first();
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
        if (count($this->productIncart) >= 1) {
            $totalAmount = $this->pay_money - $this->productIncart->sum('price');
            $this->balance = $totalAmount;
        }else{
            $this->dispatchBrowserEvent('error', [
                'message'     => 'There is no product in the cart, please add!',
            ]);
        }
    }

    public function updatedProductCode($value)
    {
        $this->InsertToCart($value);
    }

    public function createOrder()
    {     
        if (count($this->productIncart) >= 1) {
            
            $order = new Order([
                'name' => $this->name,
                'phone' => $this->phone,
                'payment_method' => $this->method,
                'payment' => $this->pay_money,
                'balance' => $this->balance
            ]);
            $order->authoredBy(auth()->user());
            $order->save();
            $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
            file_put_contents('storage/orders/barcodes/' . $order->id() . '.jpg',
                $barcodes = $generator->getBarcode($order->id(), $generator::TYPE_CODE_128, 3, 50)
            );

            $order->barcode = $order->id() . '.jpg';
            $order->save();
    
            for ($index = 0; $index < count($this->productIncart); $index++) {
    
                $orderdetail = new Orderdetail([
                    'order_uuid' => $order->id(),
                    'product_uuid' => $this->productIncart[$index]['product_id'],
                    'unitprice' => $this->productIncart[$index]['price'],
                    'quantity' => $this->productIncart[$index]['qty'],
                    'amount' => $this->productIncart[$index]['price'] * $this->productIncart[$index]['qty'],
                    'discount' => $this->productIncart[$index]['discount'],
                ]);  
                
                $orderdetail->save();
            }
    
            $cartItems = Cart::where('author_id', auth()->user()->id())->get();
    
            for ($i=0; $i < count($cartItems); $i++) { 
               $cartItems[$i]->delete();
            }
    
            $this->mount();
            $this->dispatchBrowserEvent('success', [
                'message'     => 'Order created successfully!',
            ]);
        }else{
            $this->dispatchBrowserEvent('error', [
                'message'     => 'There is no product in the cart, please add!',
            ]);
        }

    }

    public function render()
    {    
        return view('livewire.components.cashier.order.index', [
            'products' =>  $this->products,
            'application' => Application::first(),
            'categories' => ProductCategory::all(),
            'histories' => Orderdetail::where('created_at', '>=', date('Y-m-d').' 00:00:00')->latest()->limit(5)->get()
        ]);
    }
}