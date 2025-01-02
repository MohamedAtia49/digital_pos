@extends('dashboard.layouts.app')

@section('title',__('site.categories'))
@section('categories-active','active')

@section('content')

    <div class="content-wrapper">

        <section class="content-header d-flex justify-content-between align-items-center">

            <h1>@lang('site.categories')</h1>

            <ol class="breadcrumb">
                <li class="breadcrumb-main"><a href="{{ route('dashboard.index') }}"><i class="nav-icon fas fa-tachometer-alt"></i> @lang('site.dashboard')</a></li>
                <li class="active"></i> <span class="breadcrumb-span">/</span> @lang('site.categories')</li>
                <li class="active"></i> <span class="breadcrumb-span-last">/</span> @lang('site.update')</li>
            </ol>

        </section>
        <hr>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="text-center"> <span class="header-title"> @lang('site.update') @lang('site.categories') </span></h1>
                </div> <!-- end of box-header -->
                <hr>

                <div class="box-body">

                    @include('dashboard.paritals._errors')

                    <form action="{{ route('dashboard.categories.update',$category->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        @foreach (config('app.supported_locales') as $locale)
                            <div class="form-group">
                                <!-- site.ar.name -->
                                <label>@lang('site.' . $locale .'.name')</label>
                                <input type="text" class="form-control form-control-sm" name="name[{{ $locale }}]" value="{{ $category->getTranslation('name', $locale) }}" placeholder="@lang('site.name')" required>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-fix"> <i class="fa fa-edit"></i> @lang('site.update')</button>
                        </div>

                    </form>

                </div> <!-- end of box-body -->

            </div>

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
