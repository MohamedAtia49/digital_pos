<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductArchive extends Component
{
    use WithPagination;
    public $search , $category_id;

    public function mount()
    {
        // Initialize category_id with the query parameter (if exists) or set to null
        $this->category_id = request()->query('category_id', $this->category_id);
    }

    // Sync the search query with the URL
    protected $queryString = [
        'search'=> ['except' => ''],
        'category_id' => ['except' => ''], // Will persist `category_id` in the URL
    ];

    public function updatedSearch()
    {
        // Reset pagination when the search term is updated
        $this->resetPage();
    }
    public function render()
    {
        $categories = Category::select(['id','name'])->pluck( 'name','id');
        $products = Product::query()
        ->with('category')
        ->onlyTrashed()
        ->when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->when($this->category_id, function ($query) {
            $query->where('category_id', $this->category_id);
        })
        ->latest()
        ->paginate(5);

        return view('livewire.product.product-archive',['categories' => $categories ,'products'=> $products]);
    }
}
