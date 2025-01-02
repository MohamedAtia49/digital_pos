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
                            @if (auth()->user()->hasPermission('clients_create'))
                                <a href="{{ route('dashboard.clients.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                            @else
                                <a href="#" class="btn btn-primary btn-sm disabled">@lang('site.add')</a>
                            @endif
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
                            <th width='20%'>@lang('site.national_number')</th>
                            <th width='20%'>@lang('site.phone')</th>
                            <th width='20%'>@lang('site.address')</th>
                            <th width='40%'>@lang('site.action')</th>
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
                                <td>
                                    @if (auth()->user()->hasPermission('clients_update'))
                                        <a href="{{ route('dashboard.clients.edit', $client->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                    @else
                                        <a href="#" class="btn btn-success btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                    @endif

                                    @if (auth()->user()->hasPermission('clients_delete'))
                                        <form action="{{ route('dashboard.clients.destroy', $client->id) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                        </form>
                                    @else
                                        <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                    @endif
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
