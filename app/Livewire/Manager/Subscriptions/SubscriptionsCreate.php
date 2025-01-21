<?php

namespace App\Livewire\Manager\Subscriptions;

use App\Models\Subscription;
use App\Models\Tenant;
use Livewire\Component;

class SubscriptionsCreate extends Component
{
    public $tenant_id , $status , $plan;

    public function rules(){
        return [
            'tenant_id' => 'required|exists:landlord.tenants,id|unique:landlord.subscriptions,tenant_id',
            'status' => 'required',
            'plan' => 'required',
        ];
    }

    public function messages(){
        if(app()->getLocale() == 'ar'){
            return [
                'tenant_id.required' => 'حقل المتجر مطلوب .',
                'tenant_id.exists' => 'حقل المتجر غير كتاح بقاعدة البيانات .',
                "tenant_id.unique" => 'حقل المتجر لديه اشتراك بالفعل .',
                'status.required' => 'حقل الحالة مطلوب .',
                'plan.required' => 'حقل نوع الاشتراك مطلوب .',
            ];
        }elseif(app()->getLocale() == 'en'){
            return [
                'tenant_id.required' => 'The store field is required.',
                'tenant_id.exists' => 'The store field not exist in the database .',
                'tenant_id.unique' => 'This store has subscription already .',
                'status.required' => 'The status field is required.',
                'plan.required' => 'The plan field is required.',
            ];
        }
    }

    public function submit()
    {
        // Validate the data
        $data = $this->validate();
        // Check what kind of subscription type in request
        if ($data['plan'] == 'monthly')
        {
            // Create the subscription record
            $subscription = Subscription::create([
                'tenant_id' => $data['tenant_id'],
                'price' => 15.00,
                'status' => $data['status'],
                'plan' => $data['plan'],
                'start_date' => now(),
                'end_date' => now()->addMonth(),
            ]);

        }elseif ($data['plan'] == 'half_year')
        {
            // Create the subscription record
            $subscription = Subscription::create([
                'tenant_id' => $data['tenant_id'],
                'price' => 75.00,
                'status' => $data['status'],
                'plan' => $data['plan'],
                'start_date' => now(),
                'end_date' => now()->addMonths(6),
            ]);

        }elseif ($data['plan'] == 'annual')
        {
            // Create the subscription record
            $subscription = Subscription::create([
                'tenant_id' => $data['tenant_id'],
                'price' => 120.00,
                'status' => $data['status'],
                'plan' => $data['plan'],
                'start_date' => now(),
                'end_date' => now()->addYear(),
            ]);

        }

        // Reset the input fields
        $this->reset(['tenant_id', 'status', 'plan']);

        // Hide the create modal
        $this->dispatch('createModalToggle');

        // Refresh the data on the page
        $this->dispatch('refreshData')->to(SubscriptionsData::class);

        // Flash success message
        session()->flash('created_message', 'Data created successfully!');
    }
    public function render()
    {
        $stores = Tenant::paginate(10);

        return view('livewire.manager.subscriptions.subscriptions-create',['stores' => $stores]);
    }
}
