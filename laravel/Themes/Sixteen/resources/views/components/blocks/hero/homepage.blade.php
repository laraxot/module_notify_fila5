{{-- Hero Section - Design Comuni Style --}}
@props([
    'section_title' => 'CONTENUTI IN EVIDENZA',
    'featured_news' => [],
])

<section class="py-8 bg-light">
    <div class="container">
        {{-- Section Title --}}
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="text-uppercase text-muted small mb-0">{{ $section_title }}</h2>
            </div>
        </div>
        
        {{-- Featured News Card --}}
        @if($featured_news)
        <div class="row">
            <div class="col-12">
                <div class="card card-teaser shadow rounded">
                    <div class="card-body p-4">
                        @if(isset($featured_news['image']))
                        <div class="mb-3">
                            <img src="{{ $featured_news['image'] }}" alt="{{ $featured_news['title'] }}" class="img-fluid rounded" />
                        </div>
                        @endif
                        
                        @if(isset($featured_news['date']))
                        <span class="text-muted small">{{ $featured_news['date'] }}</span>
                        @endif
                        
                        <h3 class="card-title h4 mt-2 mb-3">
                            <a href="{{ $featured_news['url'] ?? '#' }}" class="text-decoration-none text-dark stretched-link">
                                {{ $featured_news['title'] }}
                            </a>
                        </h3>
                        
                        @if(isset($featured_news['excerpt']))
                        <p class="card-text text-gray-700 mb-3">
                            {{ $featured_news['excerpt'] }}
                        </p>
                        @endif
                        
                        <a href="{{ $featured_news['url'] ?? '#' }}" class="read-more text-primary font-weight-bold text-decoration-none">
                            Leggi di più
                            <x-filament::icon icon="heroicon-o-arrow-right" class="w-4 h-4 inline ms-1" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
