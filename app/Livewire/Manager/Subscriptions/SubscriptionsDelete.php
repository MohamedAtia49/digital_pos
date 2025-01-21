<?php

namespace App\Livewire\Manager\Subscriptions;

use App\Models\Subscription;
use Livewire\Component;

class SubscriptionsDelete extends Component
{
    public $subscription;
    protected $listeners = ['subscriptionDelete'];

    public function subscriptionDelete($id){
        $this->subscription = Subscription::find($id);
        $this->dispatch('deleteModalToggle');
    }

    public function submit(){
        $this->subscription->delete();
        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshData')->to(SubscriptionsData::class);
        session()->flash('deleted_message','Data Deleted Successfully');
    }
    public function render()
    {
        return view('livewire.manager.subscriptions.subscriptions-delete');
    }
}
