@extends('dashboard.layouts.app')

@section('title',__('site.users'))
@section('users-active','active')

@section('content')

    <div class="content-wrapper">

        <section class="content-header d-flex justify-content-between align-items-center">

            <h1>@lang('site.users')</h1>

            <ol class="breadcrumb">
                <li class="breadcrumb-main"><a href="{{ route('dashboard.index') }}"><i class="nav-icon fas fa-tachometer-alt"></i> @lang('site.dashboard')</a></li>
                <li class="active"></i> <span class="breadcrumb-span">/</span> @lang('site.users')</li>
                <li class="active"></i> <span class="breadcrumb-span-last">/</span> @lang('site.add')</li>
            </ol>

        </section>
        <hr>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="text-center"> <span class="header-title"> @lang('site.add') @lang('site.users') </span></h1>
                </div> <!-- end of box-header -->
                <hr>

                <div class="box-body">

                    @include('dashboard.paritals._errors')

                    <form action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" class="form-control form-control-sm" name="name" value="{{ old('name') }}" placeholder="@lang('site.name')">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.email')</label>
                            <input type="email" class="form-control form-control-sm" name="email" value="{{ old('email') }}" placeholder="@lang('site.email')">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.image')</label>
                            <input type="file" class="form-control form-control-sm image" name="image">
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('storage/admins/default.png') }}" style="width: 100px; height: 80px;" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.password')</label>
                            <input type="password" class="form-control form-control-sm" name="password" value="{{ old('password') }}" placeholder="@lang('site.password')">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.password_confirmation')</label>
                            <input type="password" class="form-control form-control-sm" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="@lang('site.password')">
                        </div>

                        <div class="form-group">

                            <label>@lang('site.permissions')</label>

                            <!-- Custom Tabs -->
                            <div class="card">
                                <div class="card-header">
                                    @php
                                        $models = ['users', 'categories', 'products','clients','orders'];
                                        $maps = ['create', 'read', 'update', 'delete','archive'];
                                    @endphp

                                    <ul class="nav nav-tabs" id="custom-tabs" role="tablist">
                                        @foreach ($models as $index => $model)
                                            <li class="nav-item">
                                                <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}-tab" data-toggle="tab" href="#{{ $model }}" role="tab" aria-controls="{{ $model }}" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                                                    @lang('site.' . $model)
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-content">
                                        @foreach ($models as $index => $model)
                                            <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="{{ $model }}" role="tabpanel" aria-labelledby="{{ $model }}-tab">
                                                @foreach ($maps as $map)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $model . '_' . $map }}" id="{{ $model . '_' . $map }}">
                                                        <label class="form-check-label" for="{{ $model . '_' . $map }}">
                                                            @lang('site.' . $map)
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div><!-- end of nav tabs -->
                        </div><!-- end of form group -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-fix"> <i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                    </form>

                </div> <!-- end of box-body -->

            </div>

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
