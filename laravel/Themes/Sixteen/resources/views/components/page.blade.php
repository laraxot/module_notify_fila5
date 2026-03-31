{{--
    Page Component - Renders pages from JSON
    Usage: <x-page side="content" :slug="$pageSlug" :data="$data" />
--}}

@props([
    'side' => 'content',
    'slug' => '',
    'data' => []
])

@php
    // Load page from JSON
    $jsonPath = config_path('local/fixcity/database/content/pages/'.$slug.'.json');
    $pageData = null;
    $blocks = [];
    
    if (file_exists($jsonPath)) {
        $pageData = json_decode(file_get_contents($jsonPath), true);
        $blocks = $pageData['content_blocks'][$data['locale'] ?? 'it'] ?? [];
    }
@endphp

<div class="page-content {{ $side }}">
    @if($pageData)
        {{-- Render content blocks --}}
        @foreach($blocks as $block)
            @if(isset($block['type']) && isset($block['data']['view']))
                @includeIf($block['data']['view'], ['data' => $block['data']])
            @endif
        @endforeach
    @else
        {{-- Error: Page not found --}}
        <div class="container py-8">
            <div class="alert alert-danger" role="alert">
                <h2 class="h4 mb-2">Pagina non trovata</h2>
                <p>La pagina <code>{{ $slug }}</code> non esiste.</p>
                <a href="/it/tests/" class="btn btn-primary mt-3">
                    Torna all'indice
                </a>
            </div>
        </div>
    @endif
</div>
