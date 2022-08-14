<?php

namespace App\Http\Livewire\Components;

use App\Models\User;
use App\Models\Product;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $users          = User::all();
        $products       = Product::all();
        return view('livewire.components.dashboard', [
            'properties'        => $properties,
            'bookings'          => $bookings,
            'users'             => $users,
            'products'          => $products
        ]);
    }
}