@extends('manager_dashboard.layouts.app')

@section('title', __('site.stores'))

@section('stores-active','active')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="mb-3">
            <h4 class="fw-bold py-3 mb-4 d-inline">@lang('site.stores')</h4>
            <button type="button" class="btn btn-sm btn-primary mb-2 mx-2" data-bs-toggle="modal" data-bs-target="#createModal">
                @lang('site.add') @lang('site.store')
            </button>
            @livewire('manager.stores.stores-create')
            @livewire('manager.stores.stores-update')
            @livewire('manager.stores.stores-delete')
        </div>
        <div class="card mb-4">
            <div class="card-body">
                @livewire('manager.stores.stores-data')
            </div>
        </div>
    </div>
    <!-- /Content -->
@endsection
