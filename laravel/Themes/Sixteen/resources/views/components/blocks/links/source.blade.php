@props([
    'source_url' => '',
])

@if($source_url)
    <div class="mt-4">
        <a href="{{ $source_url }}" class="read-more d-inline-flex align-items-center" target="_blank" rel="noopener noreferrer">
            <span>{{ __('sixteen::common.labels.source.label', ['default' => 'Vedi la fonte']) }}</span>
            <svg class="icon icon-sm ms-1" aria-hidden="true">
                <use xlink:href="{{ asset('themes/Sixteen/assets/svg/sprites.svg#it-external-link') }}"></use>
            </svg>
        </a>
    </div>
@endif
