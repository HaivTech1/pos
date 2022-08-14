<?php

namespace App\Http\Livewire\Components\Cashier\Order;

use Livewire\Component;
use App\Models\Application;

class Index extends Component
{
    public $cashierView = false;
    
    public function updatedCashierView(Type $var = null)
    {
        # code...
    }

    public function render()
    {
        return view('livewire.components.cashier.order.index', [
            'application' => Application::first()
        ]);
    }
}