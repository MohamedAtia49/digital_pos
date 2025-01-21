<div>
    <div class="mb-3">
        <input type="text" class="form-control w-25" placeholder="Search" wire:model.live='search'>
    </div>
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div>
            @if (count($data) > 0)
                <table class="table">
                    <thead class="table-dark">
                    <tr>
                        <th width='20%'><strong class="th-text">@lang('site.store')</strong></th>
                        <th width='20%'><strong class="th-text">@lang('site.status')</strong></th>
                        <th width='20%'><strong class="th-text">@lang('site.subscription_type')</strong></th>
                        <th width='20%'><strong class="th-text">@lang('site.start_date')</strong></th>
                        <th width='20%'><strong class="th-text">@lang('site.end_date')</strong></th>
                        <th width='20%'><strong class="th-text">@lang('site.action')</strong></th>
                    </tr>
                    </thead>
                    <tbody class="table table-striped table-bordered table-hover">
                        @foreach ($data as $record)
                            <tr>
                                <td><strong>{{ $record->tenant->name }}</strong></td>
                                <td>
                                    <span
                                        class="badge {{ $record->status ? 'bg-success text-primary' : 'bg-danger text-white' }} fw-bold fs-6">
                                        @lang($record->status ? 'site.active' : 'site.not_active')
                                    </span>
                                </td>
                                <td>
                                    <span
                                        class="badge fw-bold fs-6
                                            {{ $record->plan === 'monthly' ? 'bg-success text-primary' : '' }}
                                            {{ $record->plan === 'half_year' ? 'bg-warning text-white' : '' }}
                                            {{ $record->plan === 'annual' ? 'bg-primary text-white' : 'bg-secondary text-white' }}">
                                        @lang('site.' . $record->plan)
                                    </span>
                                </td>
                                <td><strong>{{ app()->getLocale() == 'ar' ? $record->arabic_start_date : $record->english_start_date }}</strong></td>
                                <td><strong>{{ app()->getLocale() == 'ar' ? $record->arabic_end_date : $record->english_end_date }}</strong></td>
                                <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item btn-outline-success" href="#" wire:click.prevent="$dispatch('subscriptionUpdate',{ id: {{ $record->id }} })" >
                                            <i class="bx bx-edit me-1"></i> @lang('site.edit')
                                        </a>
                                        <a class="dropdown-item btn-outline-danger" href="#" wire:click.prevent="$dispatch('subscriptionDelete',{ id: {{ $record->id }} })" >
                                            <i class="bx bx-trash me-1"></i> @lang('site.delete')
                                        </a>
                                    </div>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            @else
                <span class="text-danger">@lang('site.no_data_found')</span>
            @endif
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
</div>
