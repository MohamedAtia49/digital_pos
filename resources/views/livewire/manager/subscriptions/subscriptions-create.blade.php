<x-create-modal :title="__('site.add') . ' ' . __('site.subscription')">
    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('site.store_name')</label>
        <div wire:ignore>
            <select id="select2" class="form-select select2" wire:model="tenant_id">
                <option value="" selected>@lang('site.name')</option>
                @foreach($stores as $store)
                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                @endforeach
            </select>
        </div>
        @include('manager_dashboard.shortcuts.error', ['property' => 'store'])
    </div>

    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('site.status')</label>
        <select name="" wire:model='status' class="form-select">
            <option value="" selected>@lang('site.status')</option>
            <option value="1">@lang('site.active')</option>
            <option value="0">@lang('site.not_active')</option>
        </select>
        @include('manager_dashboard.shortcuts.error',['property' => 'status'])
    </div>

    <div class="col-md-12 mb-0">
        <label class="form-label">@lang('site.subscription_type')</label>
        <select name="" wire:model='plan' class="form-select">
            <option value="" selected>@lang('site.subscription_type')</option>
            <option value="monthly">@lang('site.monthly')</option>
            <option value="half_year">@lang('site.half_year')</option>
            <option value="annual">@lang('site.annual')</option>
        </select>
        @include('manager_dashboard.shortcuts.error',['property' => 'plan'])
    </div>
</x-create-modal>

{{-- @push('custom-select2')
<script>
        document.addEventListener('createModalToggle', event => {
            // Toggle the modal
            $('#createModal').modal('toggle');

            // Reinitialize Select2 when the modal is shown
            $('#createModal').on('shown.bs.modal', function () {
                $('#select2').select2({
                    width: '100%' // Ensure the dropdown matches the input width
                });

                // Update Livewire property when Select2 value changes
                $('#select2').on('change', function () {
                    @this.set('tenant_id', $(this).val());
                });
            });
        });
</script>
@endpush --}}
