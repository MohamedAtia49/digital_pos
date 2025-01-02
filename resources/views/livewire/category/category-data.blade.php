<section class="content">

    <div class="box box-primary">

        <div class="box-header with-border">

            <div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" wire:model.live="search" class="form-control" placeholder="@lang('site.search')">
                    </div>
                    <div class="col-md-4">
                        @if (auth()->user()->hasPermission('categories_create'))
                            <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                        @else
                            <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                        @endif
                    </div>
                    <div class="col-md-4 archive">
                        @if (auth()->user()->hasPermission('categories_archive'))
                            <a href="{{ route('dashboard.categories.archive') }}" class="btn btn-danger"><i class="fa fa-archive"></i> @lang('site.archive')</a>
                        @else
                            <a href="#" class="btn btn-danger disabled"><i class="fa fa-archive"></i> @lang('site.archive')</a>
                        @endif
                    </div>
                </div>
            </div> <!-- end of search -->

        </div> <!-- end of box-header -->

        <div class="box-body mt-4">
            @if ($categories->count() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width='2%'>#</th>
                            <th width='20%'>@lang('site.name')</th>
                            <th width='20%'>@lang('site.products_count')</th>
                            <th width='20%' class="text-center">@lang('site.related_products')</th>
                            <th width='40%'>@lang('site.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->getTranslation('name', app()->getLocale()) }}</td>
                                <td>{{ $category->products_count }}</td>
                                <td class="text-center"><a href="{{ route('dashboard.products.index', ['category_id' => $category->id]) }}" class="btn btn-primary">@lang('site.related_products')</a></td>
                                <td>
                                    @if (auth()->user()->hasPermission('categories_update'))
                                        <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                    @else
                                        <a href="#" class="btn btn-success btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                    @endif

                                    @if (auth()->user()->hasPermission('categories_delete'))
                                        <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="POST" style="display: inline-block">
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
                {{ $categories->links('') }}
            @else
                <h2>
                    @lang('site.no_data_found')
                </h2>
            @endif
        </div> <!-- end of box-body -->

    </div>

</section><!-- end of content -->
