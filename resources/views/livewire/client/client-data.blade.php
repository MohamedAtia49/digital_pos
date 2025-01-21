<section class="content">

    <div class="box box-primary">

        <div class="box-header with-border">
            <div>
                <div class="row">
                    <form action="" class="d-flex" role="search" method="get">
                        <div class="col-md-4">
                            <input type="text" wire:model.live='name' class="form-control product-search input-height" placeholder="@lang('site.search_name')">
                        </div>
                        <div class="col-md-4">
                            <input type="text" wire:model.live='nationalNumber' class="form-control product-search input-height" placeholder="@lang('site.search_national_number')">
                        </div>
                        <div class="col-md-4">
                            <a href="{{ auth()->user()->hasPermission('clients_create') ? route('dashboard.clients.create') : '#' }}"
                                class="btn btn-primary {{ auth()->user()->hasPermission('clients_create') ? '' : 'disabled' }} ">
                                <i class="fa fa-plus"></i> @lang('site.add')
                            </a>
                        </div>
                    </form> <!-- end form -->
                </div>
            </div> <!-- end of search -->

        </div> <!-- end of box-header -->

        <div class="box-body mt-4">
            @if ($clients->count() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width='2%'>#</th>
                            <th width='20%'>@lang('site.name')</th>
                            <th width='10%'>@lang('site.national_number')</th>
                            <th width='20%'>@lang('site.phone')</th>
                            <th width='20%'>@lang('site.address')</th>
                            <th class="text-center" width='15%'>@lang('site.add_sale')</th>
                            <th width='20%'>@lang('site.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            @php

                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->national_number }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ $client->address }}</td>
                                <td class="text-center">
                                    <a href="{{ auth()->user()->hasPermission('orders_create') ? route('dashboard.clients.sales.create', $client->id) : '#' }}"
                                        class="btn btn-primary btn-sm {{ auth()->user()->hasPermission('orders_create') ? '' : 'disabled' }}">
                                        @lang('site.add_sale')
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ auth()->user()->hasPermission('clients_update') ? route('dashboard.clients.edit', $client->id) : '#' }}"
                                        class="btn btn-success btn-sm {{ auth()->user()->hasPermission('clients_update') ? '' : 'disabled' }}">
                                        <i class="fa fa-edit"></i> @lang('site.edit')
                                    </a>
                                    <form action="{{ auth()->user()->hasPermission('clients_delete') ? route('dashboard.clients.destroy', $client->id) : '#' }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="btn btn-danger btn-sm {{ auth()->user()->hasPermission('clients_delete') ? 'delete' : 'disabled' }}">
                                            <i class="fa fa-trash"></i> @lang('site.delete')
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $clients->links('') }}
            @else
                <h2>
                    @lang('site.no_data_found')
                </h2>
            @endif
        </div> <!-- end of box-body -->

    </div>

</section><!-- end of content -->
