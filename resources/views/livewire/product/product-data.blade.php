<section class="content">

    <div class="box box-primary">

        <div class="box-header with-border">

            <div>
                <div class="row">
                    <form action="" class="d-flex" role="search" method="get">
                        <div class="col-md-4">
                            <input type="text" wire:model.live='search' class="form-control product-search input-height" placeholder="@lang('site.search')">
                        </div>
                        <div class="col-md-4">
                            <select wire:model.live="category_id" class="form-control product-search input-height">
                                <option value="">@lang('site.all_categories')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ auth()->user()->hasPermission('products_create') ? route('dashboard.products.create') : '#' }}"
                                class="btn btn-primary {{ auth()->user()->hasPermission('products_create') ? '' : 'disabled' }}">
                                <i class="fa fa-plus"></i> @lang('site.add')
                            </a>
                        </div>
                        <div class="col-md-4 product-archive">
                            <a href="{{ auth()->user()->hasPermission('products_archive') ? route('dashboard.products.archive') : '#' }}"
                                class="btn btn-danger {{ auth()->user()->hasPermission('products_archive') ? '' : 'disabled' }}">
                                <i class="fa fa-archive"></i> @lang('site.archive')
                            </a>
                        </div>
                    </form> <!-- end form -->
                </div>
            </div> <!-- end of search -->

        </div> <!-- end of box-header -->

        <div class="box-body mt-4">
            @if ($products->count() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th width='10%'>@lang('site.name')</th>
                            <th width='15%'>@lang('site.image')</th>
                            <th width='10%'>@lang('site.description')</th>
                            <th width='10%'>@lang('site.category')</th>
                            <th width='10%'>@lang('site.stock')</th>
                            <th width='10%'>@lang('site.purchase_price')</th>
                            <th width='6%'>@lang('site.sale_price')</th>
                            <th width='8%'>@lang('site.profit_percent')</th>
                            <th width='6%'>@lang('site.profit')</th>
                            <th width='20%'>@lang('site.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->getTranslation('name', app()->getLocale()) }}</td>
                                <td class="text-center">
                                    <img src="{{ asset($product->image) }}" class="img-thumbnail" width="80px" height="80px">
                                </td>
                                <td>{!! $product->getTranslation('description', app()->getLocale()) !!}</td>
                                <td>{{ $product->category->getTranslation('name', app()->getLocale()) }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->purchase_price }}</td>
                                <td>{{ $product->sale_price }}</td>
                                <td>{{ $product->profit_percent }}%</td> <!-- Use the accessor -->
                                <td>{{ $product->profit }}</td> <!-- Use the accessor -->
                                <td>
                                    <a href="{{ auth()->user()->hasPermission('products_update') ? route('dashboard.products.edit', $product->id) : '#' }}"
                                        class="btn btn-success btn-sm {{ auth()->user()->hasPermission('products_update') ? '' : 'disabled' }} ">
                                        <i class="fa fa-edit"></i> @lang('site.edit')
                                    </a>
                                    <form action="{{ auth()->user()->hasPermission('products_delete') ? route('dashboard.products.destroy', $product->id) : '#' }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="btn btn-danger btn-sm {{ auth()->user()->hasPermission('products_delete') ? 'delete' : 'disabled' }}">
                                            <i class="fa fa-trash"></i> @lang('site.delete')
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links('') }}
            @else
                <h2>
                    @lang('site.no_data_found')
                </h2>
            @endif
        </div> <!-- end of box-body -->

    </div>

</section><!-- end of content -->

@section('scripts')
    <script>
        // Re-initialize TinyMCE if content is dynamically updated
        $(document).on('content-updated', function() {
            tinymce.remove();
            tinymce.init({ selector: '.editor' });
        });
    </script>
@endsection
