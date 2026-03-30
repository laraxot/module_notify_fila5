@props([
    'side' => 'content',
    'slug' => '',
    'data' => []
])

@php
    // Load page from JSON
    $jsonPath = config_path('local/fixcity/database/content/pages/'.$slug.'.json');
    $pageData = null;
    
    if(file_exists($jsonPath)) {
        $pageData = json_decode(file_get_contents($jsonPath), true);
    }
    
    // Get blocks for current language
    $blocks = [];
    if($pageData) {
        $lang = app()->getLocale();
        $blocks = $pageData['content_blocks'][$lang] ?? $pageData['content_blocks']['it'] ?? [];
    }
@endphp

<div class="page-content {{ $side }}">
    @if(count($blocks) > 0)
        @foreach($blocks as $block)
            @if(isset($block['type']) && isset($block['data']['view']))
                @includeIf($block['data']['view'], $block['data'])
            @endif
        @endforeach
    @else
        {{-- Fallback: Show error --}}
        <div class="container mx-auto py-12">
            <div class="max-w-2xl mx-auto bg-red-50 border border-red-200 rounded-lg p-6">
                <h2 class="text-xl font-bold text-red-800 mb-2">
                    Pagina non trovata
                </h2>
                <p class="text-red-600 mb-4">
                    Il file JSON per la pagina "<code>{{ $slug }}</code>" non esiste o non contiene blocchi validi.
                </p>
                <p class="text-sm text-red-500">
                    Path atteso: <code>{{ $jsonPath }}</code>
                </p>
            </div>
        </div>
    @endif
</div>
