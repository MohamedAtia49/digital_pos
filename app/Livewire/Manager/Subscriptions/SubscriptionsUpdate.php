<?php

namespace App\Livewire\Manager\Subscriptions;

use App\Models\Subscription;
use App\Models\Tenant;
use Livewire\Component;

class SubscriptionsUpdate extends Component
{
    public $subscription , $tenant_id , $status , $plan;

    protected $listeners = ['subscriptionUpdate'];

    public function rules(){
        return [
            'tenant_id' => 'required|exists:landlord.tenants,id',
            'status' => 'required',
            'plan' => 'required',
        ];
    }

    public function subscriptionUpdate($id){
        $this->subscription = Subscription::find($id);
        $this->tenant_id = $this->subscription->tenant_id;
        $this->status = $this->subscription->status;
        $this->plan = $this->subscription->plan;
        $this->resetValidation();
        $this->dispatch('editModalToggle');
    }

    public function submit()
    {
        // Validate the data
        $data = $this->validate();

        // Check what kind of subscription type in request
        if ($data['plan'] == 'monthly')
        {
            // Create the subscription record
            $this->subscription->update([
                'tenant_id' => $data['tenant_id'],
                'status' => $data['status'],
                'plan' => $data['plan'],
                'start_date' => now(),
                'end_date' => now()->addMonth(),
            ]);

        }elseif ($data['plan'] == 'half_year')
        {
            // Create the subscription record
            $this->subscription->update([
                'tenant_id' => $data['tenant_id'],
                'status' => $data['status'],
                'plan' => $data['plan'],
                'start_date' => now(),
                'end_date' => now()->addMonths(6),
            ]);

        }elseif ($data['plan'] == 'annual')
        {
            // Create the subscription record
            $this->subscription->update([
                'tenant_id' => $data['tenant_id'],
                'status' => $data['status'],
                'plan' => $data['plan'],
                'start_date' => now(),
                'end_date' => now()->addYear(),
            ]);

        }

        // Reset the input fields
        $this->reset(['tenant_id', 'status', 'plan']);

        // Hide the create modal
        $this->dispatch('editModalToggle');

        // Refresh the data on the page
        $this->dispatch('refreshData')->to(SubscriptionsData::class);

        // Flash success message
        session()->flash('updated_message', 'Data updated successfully!');
    }
    public function render()
    {
        $stores = Tenant::paginate(10);
        return view('livewire.manager.subscriptions.subscriptions-update',['stores' => $stores]);
    }
}
