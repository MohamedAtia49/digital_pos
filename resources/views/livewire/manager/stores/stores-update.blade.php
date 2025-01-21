<x-update-modal :title="__('site.edit') . ' ' . __('site.store')">
    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('site.name')</label>
        <input type="text" class="form-control" placeholder="@lang('site.name')" wire:model='name'/>
        @include('manager_dashboard.shortcuts.error',['property' => 'name'])
    </div>

    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('site.domain')</label>
        <input type="text" class="form-control" placeholder="@lang('site.domain')" wire:model='domain'/>
        @include('manager_dashboard.shortcuts.error',['property' => 'domain'])
    </div>

    <div class="col-md-12 mb-0">
        <label class="form-label">@lang('site.database')</label>
        <input type="text" class="form-control" placeholder="@lang('site.database')" wire:model='database'/>
        @include('manager_dashboard.shortcuts.error',['property' => 'database'])
    </div>
</x-update-modal>
