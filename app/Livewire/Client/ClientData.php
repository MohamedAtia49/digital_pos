<?php

namespace App\Livewire\Client;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class ClientData extends Component
{
    use WithPagination;
    public $name;
    public $nationalNumber;

    // Sync the search query with the URL
    protected $queryString = [
        'name' => ['except' => ''],
        'nationalNumber' => ['except' => ''],
    ];

    // Reset pagination when the search term changes
    public function updatedName()
    {
        $this->resetPage();
    }
    public function updatedNationalNumber()
    {
        $this->resetPage();
    }
    public function render()
    {
        $clients = Client::query()
        ->when($this->name, function ($query) {
            $query->where('name', 'like', '%' . $this->name . '%');
        })
        ->when($this->nationalNumber, function ($query) {
            $query->where('national_number', 'like', '%' . $this->nationalNumber . '%');
        })
        ->latest()->paginate(5);

        return view('livewire.client.client-data',['clients' => $clients]);
    }
}
