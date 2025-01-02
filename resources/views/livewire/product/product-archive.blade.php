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
                            <select wire:model.live="category_id" class="form-control product-search input-height ml-4">
                                <option value="">@lang('site.all_categories')</option>
                                @foreach ($categories as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form> <!-- end form -->
                </div>
            </div>
        </div> <!-- end of search -->
    </div> <!-- end of box-header -->

        <div class="box-body mt-4">
            @if ($products->count() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width='2%'>#</th>
                            <th width='40%'>@lang('site.name')</th>
                            <th width='15%' class="text-center">@lang('site.image')</th>
                            <th width='10%' class="text-center">@lang('site.category')</th>
                            <th width='40%' class="text-center">@lang('site.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->getTranslation('name', app()->getLocale()) }}</td>
                                <td class="text-center">
                                    <img src="{{ asset($product->image) }}" class="img-thumbnail" width="80px" height="80px">
                                </td>
                                <td class="text-center">{{ $product->category->getTranslation('name', app()->getLocale()) }}</td>
                                <td class="text-center">
                                    <form action="{{ route('dashboard.products.restore', $product->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success restore btn-archive">@lang('site.restore')</button>
                                    </form>
                                    <form action="{{ route('dashboard.products.force_delete', $product->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete btn-force-delete btn-archive">@lang('site.force_delete')</button>
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
