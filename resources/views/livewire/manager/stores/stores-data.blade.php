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
                        <th width='20%'><strong class="th-text">@lang('site.name')</strong></th>
                        <th width='20%'><strong class="th-text">@lang('site.domain')</strong></th>
                        <th width='20%'><strong class="th-text-database">@lang('site.database')</strong></th>
                        <th width='20%'><strong class="th-text">@lang('site.created_from')</strong></th>
                        <th width='20%'><strong class="th-text">@lang('site.action')</strong></th>
                    </tr>
                    </thead>
                    <tbody class="table table-striped table-bordered table-hover">
                        @foreach ($data as $record)
                            <tr>
                                <td><strong>{{ $record->name }}</strong></td>
                                <td><strong>{{ $record->domain }}</strong></td>
                                <td><strong>{{ $record->database }}</strong></td>
                                <td><strong>{{ app()->getLocale() == 'ar' ? $record->arabic_date : $record->english_date }}</strong></td>
                                <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item btn-outline-success" href="#" wire:click.prevent="$dispatch('storeUpdate',{ id: {{ $record->id }} })" >
                                            <i class="bx bx-edit me-1"></i> @lang('site.edit')
                                        </a>
                                        <a class="dropdown-item btn-outline-danger" href="#" wire:click.prevent="$dispatch('storeDelete',{ id: {{ $record->id }} })" >
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
