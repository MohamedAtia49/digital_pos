<span wire:loading.remove>
    {{ $buttonName }}
</span>
<div class="text-center" wire:loading wire:target='image'>
    <span class="spinner-border spinner-border-sm text-white" role="status">
        <span class="visually-hidden">@lang('site.loading')</span>
    </span>
</div>
