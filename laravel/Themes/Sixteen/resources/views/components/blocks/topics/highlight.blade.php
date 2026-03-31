{{-- Topics Highlight Grid - Bootstrap Italia Style --}}
{{-- Reference: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html --}}
@props([
    'title' => 'Argomenti in evidenza',
    'items' => [],
    'show_all_url' => '',
    'show_all_label' => 'Mostra tutti',
])

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title mb-5">{{ $title }}</h2>
        
        {{-- Topics Grid --}}
        <div class="row g-4">
            @foreach($items as $item)
            <div class="col-lg-3 col-md-6">
                <div class="card card-teaser shadow-sm h-100">
                    <div class="card-body">
                        <h3 class="card-title h6 text-uppercase text-muted mb-3">
                            {{ $item['title'] ?? '' }}
                        </h3>
                        @if(!empty($item['description']))
                        <p class="card-text small">{{ $item['description'] }}</p>
                        @endif
                        @if(!empty($item['list_items']))
                        <ul class="card-list list-unstyled small mt-3 mb-3">
                            @foreach($item['list_items'] as $listItem)
                            <li>• {{ $listItem }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <a href="{{ $item['url'] ?? '#' }}" 
                           class="btn btn-outline-primary btn-sm mt-3">
                            {{ $item['cta_label'] ?? 'Esplora argomento' }}
                            <svg class="icon icon-xs ms-1" aria-hidden="true">
                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-chevron-right"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        {{-- Show All Card --}}
        @if($show_all_url || count($items) > 0)
        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title h5 mb-3">ALTRI ARGOMENTI</h3>
                        <ul class="card-list list-unstyled mb-3">
                            <li>• Associazioni</li>
                            <li>• Concorsi</li>
                            <li>• Energie rinnovabili</li>
                            <li>• Gestione rifiuti</li>
                        </ul>
                        @if($show_all_url)
                        <a href="{{ $show_all_url }}" class="btn btn-outline-primary btn-sm">
                            {{ $show_all_label }}
                            <svg class="icon icon-xs ms-1" aria-hidden="true">
                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-chevron-right"></use>
                            </svg>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
