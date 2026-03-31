{{-- Hero Homepage - Bootstrap Italia Style --}}
{{-- Reference: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html --}}
@props([
    'news'           => [],
    'image'          => null,
    'all_news_label' => 'Tutte le novità',
    'all_news_url'   => '#',
])

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="text-center mb-5">CONTENUTI IN EVIDENZA</h2>
                
                @if(!empty($news))
                <article class="card card-teaser shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                @if($image)
                                <img src="{{ $image }}" 
                                     alt="{{ $news['title'] ?? '' }}" 
                                     class="img-fluid rounded" 
                                     loading="lazy" />
                                @endif
                            </div>
                            <div class="col-md-7">
                                <div class="card-date text-primary small mb-2">
                                    @if(!empty($news['category']))
                                    <span class="me-2">{{ $news['category'] }}</span>
                                    @endif
                                    @if(!empty($news['date']))
                                    <time datetime="{{ $news['date'] }}">{{ $news['date'] }}</time>
                                    @endif
                                </div>
                                
                                @if(!empty($news['title']))
                                <h3 class="card-title h5">
                                    <a href="{{ $news['url'] ?? '#' }}" class="text-decoration-none stretched-link">
                                        {{ $news['title'] }}
                                    </a>
                                </h3>
                                @endif
                                
                                @if(!empty($news['excerpt']))
                                <p class="card-text mt-3 text-muted">
                                    {{ $news['excerpt'] }}
                                </p>
                                @endif
                                
                                @if(!empty($news['tag']))
                                <div class="mb-3">
                                    <span class="badge bg-primary bg-opacity-10 text-primary">
                                        {{ $news['tag'] }}
                                    </span>
                                </div>
                                @endif
                                
                                <a href="{{ $all_news_url }}" 
                                   class="btn btn-outline-primary btn-sm mt-3">
                                    {{ $all_news_label }}
                                    <svg class="icon icon-xs ms-1" aria-hidden="true">
                                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-chevron-right"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
                @endif
            </div>
        </div>
    </div>
</section>
