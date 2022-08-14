<?php

namespace App\Http\Livewire\Components\Manager;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductCategory;

class Category extends Component
{
    use WithPagination;

    public $selectedRows = [];
    public $selectPageRows = false;
    public $count = 5;
    public $name = ''; 

    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->categories->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        }
        else{
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }

    public function getCategoriesProperty()
    {
        return ProductCategory::search(trim($this->search))->loadLatest($this->count);
    }

    public function createCategory()
    {
        
        $this->validate([
            'name' => 'required|string',
        ]);

        $name = new ProductCategory([
            'name' => $this->name
        ]);
        
        $name->save();

        $this->dispatchBrowserEvent('success', [
            'message'     => 'Category created successfully!',
        ]);

        $this->name = '';

    }

    public function resetState()
    {
        $this->name = '';
    }

    public function deleteAll()
    {
        ProductCategory::whereIn('id', $this->selectedRows)->delete();

        $this->dispatchBrowserEvent('alert', ['message' => 'All selected classes
            were deleted']);

        $this->reset(['selectedRows', 'selectPageRows']);
    }

    
    public function render()
    {
        return view('livewire.components.manager.category', [
            'categories' => $this->categories
        ]);
    }
}