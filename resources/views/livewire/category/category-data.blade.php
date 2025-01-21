<section class="content">

    <div class="box box-primary">

        <div class="box-header with-border">

            <div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" wire:model.live="search" class="form-control" placeholder="@lang('site.search')">
                    </div>
                    <div class="col-md-4">
                        <a href="{{ auth()->user()->hasPermission('categories_create') ? route('dashboard.categories.create') : '#' }}"
                            class="btn btn-primary {{ auth()->user()->hasPermission('categories_create') ? '' : 'disabled' }}">
                            <i class="fa fa-plus"></i> @lang('site.add')
                        </a>
                    </div>
                    <div class="col-md-4 archive">
                        <a href="{{ auth()->user()->hasPermission('categories_archive') ? route('dashboard.categories.archive') : '#' }}"
                            class="btn btn-danger {{ auth()->user()->hasPermission('categories_archive') ? '' : 'disabled' }}">
                            <i class="fa fa-archive"></i> @lang('site.archive')
                        </a>
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
                                    <a href="{{ auth()->user()->hasPermission('categories_update') ? route('dashboard.categories.edit', $category->id) : '#' }}"
                                        class="btn btn-success btn-sm {{ auth()->user()->hasPermission('categories_update') ? '' : 'disabled' }}">
                                        <i class="fa fa-edit"></i> @lang('site.edit')
                                    </a>
                                    <form action="{{ auth()->user()->hasPermission('categories_delete') ? route('dashboard.categories.destroy', $category->id) : '#' }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="btn btn-danger btn-sm {{ auth()->user()->hasPermission('categories_delete') ? 'delete' : 'disabled' }}" >
                                            <i class="fa fa-trash"></i> @lang('site.delete')
                                        </button>
                                    </form>
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
