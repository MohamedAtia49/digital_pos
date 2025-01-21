<!-- Modal -->
@props(['title'])
<form wire:submit.prevent='submit'>
    @if (session()->has('updated_message'))
        <div class="alert alert-success text-center create-alert">
            {{ session('updated_message') }}
        </div>
    @endif
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="margin-top: 25px" id="exampleModalLabel1">{{ $title }}</h5>
                    <button type="button"  class="btn btn-sm btn-warning btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{ $slot }}
                    </div>
                </div>
                <div class="modal-footer create-footer">
                    <button type="button" class="manager-btn-close btn-close-fix btn btn-warning btn-outline-danger" data-bs-dismiss="modal">
                            @lang('site.close')
                    </button>
                    <button type="submit" class="manager-btn-add btn btn-warning btn-outline-danger">
                        @include('manager_dashboard.shortcuts.loading',['buttonName' => __('site.update')])
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- /Modal -->
