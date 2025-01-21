<?php

namespace App\Livewire\Manager\Subscriptions;

use App\Models\Subscription;
use Livewire\Component;
use Livewire\WithPagination;

class SubscriptionsData extends Component
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
        return view('livewire.manager.subscriptions.subscriptions-data',
        ['data' => Subscription::with('tenant')->whereRelation('tenant' ,'name', 'like' ,'%'. $this->search .'%')->paginate(5)]);
    }
}
