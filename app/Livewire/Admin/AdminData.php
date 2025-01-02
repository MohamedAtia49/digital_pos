<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminData extends Component
{
    use WithPagination;
    public $search;

    // Sync the search query with the URL
    protected $queryString = ['search'];

    public function updatedSearch()
    {
        // Reset pagination when the search term is updated
        $this->resetPage();
    }
    public function render()
    {
        // Fetch users based on search and role criteria
        $users = User::query()
        ->whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })
        ->when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->paginate(5);

        // Pass users to the Blade view
        return view('livewire.admin.admin-data', ['users' => $users]);
    }
}
