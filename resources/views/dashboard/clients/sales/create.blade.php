@extends('dashboard.layouts.app')

@section('title',__('site.sales'))
@section('sales-active','sidebar-active')

@section('content')

    <div class="content-wrapper">

        <section class="content-header d-flex justify-content-between align-items-center">

            <h1>@lang('site.sales')</h1>

            <ol class="breadcrumb">
                <li class="breadcrumb-main"><a href="{{ route('dashboard.index') }}"><i class="nav-icon fas fa-tachometer-alt"></i> @lang('site.dashboard')</a></li>
                <li class="active"><span class="breadcrumb-span">/</span> @lang('site.sales')</li>
                <li class="active"></i> <span class="breadcrumb-span-last">/</span> @lang('site.add')</li>
            </ol>

        </section>
        <hr>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="text-center"> <span class="header-title"> @lang('site.create_sale')</span></h1>
                </div> <!-- end of box-header -->
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header card-color">
                                <h3 class="card-title cat-name" style="margin-bottom: 10px">@lang('site.categories')</h3>
                            </div><!-- end of card header -->

                            <div class="card-body">
                                @foreach ($categories as $category)
                                    <div class="accordion" id="accordion-{{ str_replace(' ', '-', $category->name) }}">
                                        <div class="card">
                                            <div class="card-header cat-title" id="heading-{{ str_replace(' ', '-', $category->name) }}"
                                                data-toggle="collapse" data-target="#collapse-{{ str_replace(' ', '-', $category->name) }}"
                                                aria-expanded="true" aria-controls="collapse-{{ str_replace(' ', '-', $category->name) }}">
                                                <h4 class="mb-0">
                                                    <button class="btn btn-link" type="button"
                                                        aria-expanded="true" aria-controls="collapse-{{ str_replace(' ', '-', $category->name) }}">
                                                        <span class="cat-name"> {{ $category->name }} </span>
                                                    </button>
                                                </h4>
                                            </div>

                                            <div id="collapse-{{ str_replace(' ', '-', $category->name) }}"
                                                    class="collapse"
                                                    aria-labelledby="heading-{{ str_replace(' ', '-', $category->name) }}"
                                                    data-parent="#accordion-{{ str_replace(' ', '-', $category->name) }}">
                                                <div class="card-body">
                                                    @if ($category->products()->count() > 0)
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>@lang('site.name')</th>
                                                                    <th>@lang('site.stock')</th>
                                                                    <th>@lang('site.sale_price')</th>
                                                                    <th class="text-center">@lang('site.add')</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($category->products as $product)
                                                                    <tr>
                                                                        <td>{{ $product->name }}</td>
                                                                        <td>{{ $product->stock }}</td>
                                                                        <td>{{ number_format($product->sale_price,2) }}</td>
                                                                        <td class="text-center">
                                                                            <a href=""
                                                                                id="product-{{ $product->id }}"
                                                                                data-name="{{ $product->name }}"
                                                                                data-id="{{ $product->id }}"
                                                                                data-price="{{ $product->sale_price }}"
                                                                                class="btn btn-success btn-sm add-product-btn {{ ($product->stock <= 0) ? 'disabled' : '' }}">
                                                                                <i class="fa fa-plus"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <h5>@lang('site.no_data_found')</h5>
                                                    @endif
                                                </div><!-- end of card body -->
                                            </div><!-- end of collapse -->
                                        </div><!-- end of card -->
                                    </div><!-- end of accordion -->
                                @endforeach
                                {{ $categories->links('pagination::bootstrap-4') }}
                            </div><!-- end of card body -->
                        </div><!-- end of card -->
                    </div><!-- end of col -->

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header card-color">
                                <h3 class="card-title cat-name" style="margin-bottom: 10px">@lang('site.sales')</h3>
                            </div><!-- end of card header -->

                            <div class="card-body">

                                <form action="{{ route('dashboard.clients.sales.store', $client->id) }}" method="post">

                                    @csrf
                                    @method('POST')

                                    @include('dashboard.partials._errors')

                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>@lang('site.product')</th>
                                                <th>@lang('site.quantity')</th>
                                                <th>@lang('site.price')</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody class="order-list">


                                        </tbody>

                                    </table><!-- end of table -->
                                    <hr>
                                    <h5 class="text-center"><span class="invoice-title">@lang('site.sub_total')</span>  : <span class="sub-total-price invoice-m">٠٫٠٠</span></h5>
                                    <h5 class="text-center"><span class="invoice-title">@lang('site.tax')</span>  : <span class="invoice-m">14%</span></h5>
                                    <h5 class="text-center"><span class="invoice-title">@lang('site.total')</span>  : <span class="total-price invoice-m">٠٫٠٠</span></h5>

                                    <button type="submit" id="add-order-form-btn" class="btn btn-green btn-block disabled"><i class="fa fa-plus"></i> @lang('site.add_sale')</button>

                                </form>

                            </div><!-- end of card body -->
                        </div><!-- end of card -->
                    </div><!-- end of col -->
                </div>
            </div>

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
