@extends('dashboard.layouts.app')

@section('title',__('site.categories'))
@section('categories-active','active')

@section('content')

<div class="content-wrapper">

    <section class="content-header d-flex justify-content-between align-items-center">

        <h1 class="badge badge-danger text-white data-deleted">@lang('site.categories_deleted')</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-main"><a href="{{ route('dashboard.index') }}"><i class="nav-icon fas fa-tachometer-alt"></i> @lang('site.dashboard')</a></li>
            <li class="active"></i> <span class="breadcrumb-span">/</span> @lang('site.categories')</li>
            <li class="active"></i> <span class="breadcrumb-span-last">/</span> @lang('site.archive')</li>
        </ol>

    </section>

    @livewire('category.category-archive')

</div><!-- end of content wrapper -->

@endsection
