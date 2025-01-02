@extends('dashboard.layouts.app')

@section('title',__('site.clients'))
@section('clients-active','active')

@section('content')

    <div class="content-wrapper">

        <section class="content-header d-flex justify-content-between align-items-center">

            <h1>@lang('site.clients')</h1>

            <ol class="breadcrumb">
                <li class="breadcrumb-main"><a href="{{ route('dashboard.index') }}"><i class="nav-icon fas fa-tachometer-alt"></i> @lang('site.dashboard')</a></li>
                <li class="active"></i> <span class="breadcrumb-span">/</span> @lang('site.clients')</li>
                <li class="active"></i> <span class="breadcrumb-span-last">/</span> @lang('site.update')</li>
            </ol>

        </section>
        <hr>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="text-center"> <span class="header-title"> @lang('site.update') @lang('site.clients') </span></h1>
                </div> <!-- end of box-header -->
                <hr>

                <div class="box-body">

                    @include('dashboard.paritals._errors')

                    <form action="{{ route('dashboard.clients.update',$client->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" class="form-control form-control-sm" name="name" value="{{ $client->name }}" placeholder="@lang('site.name')">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.national_number')</label>
                            <input type="text" class="form-control form-control-sm" name="national_number" value="{{ $client->national_number }}" placeholder="@lang('site.national_number')">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.phone')</label>
                            <input type="text" class="form-control form-control-sm" name="phone[]" value="{{ json_decode($client->getRawOriginal('phone'))[0] ?? '' }}" placeholder="@lang('site.phone')">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.additional_phone') <span class="optional"> ( @lang('site.optional') ) </span></label>
                            <input type="text" class="form-control form-control-sm" name="phone[]" value="{{ json_decode($client->getRawOriginal('phone'))[1] ?? '' }}" placeholder="@lang('site.phone')">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.email') <span class="optional"> ( @lang('site.optional') ) </span></label>
                            <input type="email" class="form-control form-control-sm" name="email" value="{{ $client->email }}" placeholder="@lang('site.email')">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.address')</label>
                            <input type="text" class="form-control form-control-sm" name="address" value="{{ $client->address }}" placeholder="@lang('site.address')">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-fix"> <i class="fa fa-plus"></i> @lang('site.update')</button>
                        </div>

                    </form>

                </div> <!-- end of box-body -->

            </div>

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
