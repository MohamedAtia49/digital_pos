@extends('manager_dashboard.layouts.app')

@section('title', __('site.subscriptions'))

@section('subscriptions-active','active')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="mb-3">
            <h4 class="fw-bold py-3 mb-4 d-inline">@lang('site.subscriptions')</h4>
            <button type="button" class="btn btn-sm btn-primary mb-2 mx-2" data-bs-toggle="modal" data-bs-target="#createModal">
                @lang('site.add') @lang('site.subscription')
            </button>
            @livewire('manager.subscriptions.subscriptions-create')
            @livewire('manager.subscriptions.subscriptions-update')
            @livewire('manager.subscriptions.subscriptions-delete')
        </div>
        <div class="card mb-4">
            <div class="card-body">
                @livewire('manager.subscriptions.subscriptions-data')
            </div>
        </div>
    </div>
    <!-- /Content -->
@endsection
