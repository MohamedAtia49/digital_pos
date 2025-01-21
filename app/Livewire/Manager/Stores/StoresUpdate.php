<?php

namespace App\Livewire\Manager\Stores;

use App\Models\Tenant;
use App\Traits\ManagesTenantDatabase;
use Livewire\Component;

class StoresUpdate extends Component
{
    use ManagesTenantDatabase;
    public $store , $name , $domain , $database;
    protected $listeners = ['storeUpdate'];
    public function rules(){
        $storeId = $this->currentStoreId();
        return [
            'name' => 'required|unique:landlord.tenants,name,' . $storeId,
            'domain' => 'required|unique:landlord.tenants,domain,' . $storeId,
            'database' => 'required|unique:landlord.tenants,database,' . $storeId,
        ];
    }

    public function messages(){
        if(app()->getLocale() == 'ar'){
            return [
                'name.required' => 'حقل الاسم مطلوب .',
                'name.unique' => 'هذا الاسم مستخدم من قبل .',
                'domain.required' => 'حقل الدومين مطلوب .',
                'domain.unique' => 'هذا الدومين مستخدم من قبل .',
                'database.required' => 'حقل قاعدة البيانات مطلوب .',
                'database.unique' => 'اسم قاعدة البيانات مستخدم من قبل .',
            ];
        }elseif(app()->getLocale() == 'en'){
            return [
                'name.required' => 'The name field is required.',
                'name.unique' => 'The name is already used .',
                'domain.required' => 'The domain field is required.',
                'domain.unique' => 'The domain is already used .',
                'database.required' => 'The database field is required.',
                'database.unique' => 'The database name is already used .',
            ];
        }
    }
    protected function currentStoreId()
    {
        return $this->store->id;
    }

    public function storeUpdate($id){
        $this->store = Tenant::find($id);
        $this->name = $this->store->name;
        $this->domain = $this->store->domain;
        $this->database = $this->store->database;
        $this->resetValidation();
        $this->dispatch('editModalToggle');
    }

    public function submit()
    {
        // Validate the data
        $data = $this->validate();

        // Get current store database name
        $oldDatabaseName = $this->store->database;

        // Check if there is new database name in the request
        if($data['database'] == $oldDatabaseName){
            // Update the store record
            $this->store->update($data);
        }else{
            $newDatabaseName = $data['database'];
            // Validate database name
            if (!preg_match('/^[a-zA-Z0-9_]+$/', $newDatabaseName)) {
                return;
            }

            $newDatabaseName = $data['database'];
            // Update the store record
            $this->store->update($data);
            // update the store's database
            $this->updateTenantDatabase($oldDatabaseName , $data['database']);
        }

        $this->dispatch('editModalToggle');
        $this->dispatch('refreshData')->to(StoresData::class);
        session()->flash('updated_message','Data Updated Successfully');
    }
    public function render()
    {
        return view('livewire.manager.stores.stores-update');
    }
}
