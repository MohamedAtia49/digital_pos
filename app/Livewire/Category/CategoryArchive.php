<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryArchive extends Component
{
    use WithPagination;
    public $search;

    // Sync the search query with the URL
    protected $queryString = [
        'search'=> ['except' => ''],
    ];

    public function updatedSearch()
    {
        // Reset pagination when the search term is updated
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::query()
        ->onlyTrashed()
        ->when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->latest()
        ->paginate(5);

        return view('livewire.category.category-archive',['categories' => $categories]);
    }
}
