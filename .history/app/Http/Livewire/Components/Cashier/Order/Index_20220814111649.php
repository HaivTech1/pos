<?php

namespace App\Http\Livewire\Components\Cashier\Order;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Application;
use App\Models\ProductCategory;

class Index extends Component
{
    public $cashierView = false;
    public $orders, 
    public $products = [], 
    public $prodoct_code, 
    public $message = '', 
    public $productIncart;

    public $pay_money = '', 
    public $balance = '';
    public $searchProduct;
    public $searchSortProduct;
    public $searchSectionProduct;
    public $discount;
    public $histories;
    
    public function updatedCashierView($value)
    {
        $this->cashierView = $value;
    }

    public function mount()
    {
        $this->productIncart = Cart::where('author_id', auth()->id())->get();
        $this->histories = OrderDetail::where('date', date('d-m-Y'))->latest()->limit(5)->get();
    }

    public function render()
    {
        return view('livewire.components.cashier.order.index', [
            'application' => Application::first(),
            'categories' => ProductCategory::all()
        ]);
    }
}