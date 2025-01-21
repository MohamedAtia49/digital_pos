<?php

namespace App\Livewire\Manager\Stores;

use App\Models\Tenant;
use App\Traits\ManagesTenantDatabase;
use Livewire\Component;

class StoresDelete extends Component
{
    use ManagesTenantDatabase;
    public $store;
    protected $listeners = ['storeDelete'];

    public function storeDelete($id){
        $this->store = Tenant::find($id);
        $this->dispatch('deleteModalToggle');
    }

    public function submit(){
        $this->store->delete();
        $databaseName = $this->store->database;
        $this->deleteTenantDatabase($databaseName);

        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshData')->to(StoresData::class);
        session()->flash('deleted_message','Data Deleted Successfully');
    }
    public function render()
    {
        return view('livewire.manager.stores.stores-delete');
    }
}
