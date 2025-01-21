<?php

namespace App\Livewire\Manager\Stores;

use App\Models\Tenant;
use App\Traits\ManagesTenantDatabase;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StoresCreate extends Component
{
    use ManagesTenantDatabase;
    public $name , $domain , $database;
    public function rules(){
        return [
            'name' => 'required|unique:landlord.tenants,name',
            'domain' => 'required|unique:landlord.tenants,domain',
            'database' => 'required|unique:landlord.tenants,database',
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
    public function submit()
    {
            // Validate the data
            $data = $this->validate();

            // Create the tenant record
            $tenant = Tenant::create($data);

            // Create the tenant's database
            $this->createTenantDatabase($data['database']);

            // Run migrations for the tenant's database
            $this->runTenantMigrations($data['database']);

            // Reset the input fields
            $this->reset(['name', 'domain', 'database']);

            // Hide the create modal
            $this->dispatch('createModalToggle');

            // Refresh the data on the page
            $this->dispatch('refreshData')->to(StoresData::class);

            // Flash success message
            session()->flash('created_message', 'Tenant and database created successfully!');
    }

    public function render()
    {
        return view('livewire.manager.stores.stores-create');
    }
}
