<?php

namespace App\Livewire\Manager\Stores;

use App\Models\Tenant;
use Livewire\Component;
use Livewire\WithPagination;

class StoresData extends Component
{
    use WithPagination;
    public $search;

    protected $queryString = [
        'search'=> ['except' => ''],
    ];
    public function updatingSearch(){
        $this->resetPage();
    }
    protected $listeners = ['refreshData' => '$refresh'];
    public function render()
    {
        return view('livewire.manager.stores.stores-data',
        ['data' => Tenant::where('name' , 'like' ,'%'. $this->search .'%')->paginate(5)]);
    }
}
