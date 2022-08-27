<?php

namespace App\Http\Livewire\Components\Manager\Supplier;

use App\Models\Brand;
use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $selectedRows = [];
    public $selectPageRows = false;
    public $count = 5;

    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->suppliers->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        }
        else{
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }
    
    public function getSuppliersProperty()
    {
        return Supplier::search(trim($this->search))->loadLatest($this->count);
    }

    public function render()
    {
        return view('livewire.components.manager.supplier.index',[
            'suppliers' => $this->suppliers,
            'brands' => Brand::all()->pluck('title', 'id')
        ]);
    }
}