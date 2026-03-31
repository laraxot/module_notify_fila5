{{-- Governance Cards Block - Bootstrap Italia Style --}}
{{-- Reference: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html --}}
@props([
    'title' => 'Organi di governo',
    'items' => [],
])

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">{{ $title }}</h2>
        
        <div class="row g-4">
            @foreach($items as $item)
            
            @if(!empty($item['image']))
            {{-- Card con immagine (es. Sindaco) --}}
            <div class="col-lg-4 col-md-6">
                <div class="card card-teaser shadow-sm h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="card-category text-muted small text-uppercase mb-2">
                                    {{ $item['category'] ?? $title }}
                                </div>
                                @if(!empty($item['name']))
                                <h3 class="card-title h5">{{ $item['name'] }}</h3>
                                @endif
                                <p class="card-text text-muted">{{ $item['title'] ?? '' }}</p>
                            </div>
                            @if(!empty($item['image']))
                            <div class="col-4">
                                <img src="{{ $item['image'] }}" 
                                     alt="{{ $item['name'] ?? $item['title'] ?? '' }}" 
                                     class="img-fluid rounded" />
                            </div>
                            @endif
                        </div>
                        <a href="{{ $item['url'] ?? '#' }}" 
                           class="btn btn-outline-primary btn-sm mt-3">
                            Vai alla pagina
                            <svg class="icon icon-xs ms-1" aria-hidden="true">
                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-chevron-right"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            @else
            {{-- Card senza immagine (es. Giunta, Consiglio) --}}
            <div class="col-lg-4 col-md-6">
                <div class="card card-teaser shadow-sm h-100">
                    <div class="card-body">
                        <div class="card-category text-muted small text-uppercase mb-2">
                            {{ $item['category'] ?? $title }}
                        </div>
                        <h3 class="card-title h5">{{ $item['title'] ?? '' }}</h3>
                        @if(!empty($item['description']))
                        <p class="card-text text-muted">{{ $item['description'] }}</p>
                        @endif
                        <a href="{{ $item['url'] ?? '#' }}" 
                           class="btn btn-outline-primary btn-sm mt-3">
                            Vai alla pagina
                            <svg class="icon icon-xs ms-1" aria-hidden="true">
                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-chevron-right"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endif
            
            @endforeach
        </div>
    </div>
</section>
