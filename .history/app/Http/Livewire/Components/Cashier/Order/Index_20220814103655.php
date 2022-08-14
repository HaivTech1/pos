<?php

namespace App\Http\Livewire\Components\Cashier\Order;

use Livewire\Component;

class Index extends Component
{
    public $cashierView = false;

    public function render()
    {
        return view('livewire.components.cashier.order.index', [
            'application' => Application::first();
        ]);
    }
}