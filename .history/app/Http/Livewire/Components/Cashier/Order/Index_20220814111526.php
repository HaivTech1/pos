<?php

namespace App\Http\Livewire\Components\Cashier\Order;

use Livewire\Component;
use App\Models\Application;
use App\Models\ProductCategory;

class Index extends Component
{
    public $cashierView = false;
    public $orders, 
    $products = [], 
    $prodoct_code, 
    $message = '', 
    $productIncart;

    public $pay_money = '', $balance = '';
    public $sections;
    public $setting;
    public $searchProduct;
    public $searchSortProduct;
    public $searchSectionProduct;
    public $discount;
    public $histories;
    
    public function updatedCashierView($value)
    {
        $this->cashierView = $value;
    }

    public function render()
    {
        return view('livewire.components.cashier.order.index', [
            'application' => Application::first(),
            'categories' => ProductCategory::all()
        ]);
    }
}