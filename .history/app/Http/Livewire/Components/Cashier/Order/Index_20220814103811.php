<?php

namespace App\Http\Livewire\Components\Cashier\Order;

use Livewire\Component;
use App\Models\Application;

class Index extends Component
{

    public function render()
    {
        return view('livewire.components.cashier.order.index', [
            'application' => Application::first()
        ]);
    }
}