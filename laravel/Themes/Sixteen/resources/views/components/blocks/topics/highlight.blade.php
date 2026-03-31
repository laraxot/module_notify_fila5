@props([
    'title' => 'Argomenti in evidenza',
    'items' => [],
    'show_all_url' => '',
    'other_topics' => [],
])

<section class="py-8">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="title-xxlarge mb-0">{{ $title }}</h2>
            </div>
        </div>

        <div class="row g-4">
            @foreach($items as $item)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-bg shadow-sm h-100">
                    <div class="card-body p-4">
                        <h3 class="card-title h5 mb-2">
                            <a href="{{ $item['url'] ?? '#' }}" class="text-decoration-none text-dark stretched-link">
                                {{ $item['title'] }}
                            </a>
                        </h3>
                        @if(!empty($item['description']))
                            <p class="card-text text-muted small mb-3">{{ $item['description'] }}</p>
                        @endif
                        @if(!empty($item['external']))
                            <a href="{{ $item['external_url'] ?? '#' }}" class="text-primary small d-block mb-2">
                                {{ $item['external'] }}
                                <x-filament::icon icon="heroicon-o-arrow-top-right-on-square" class="w-3 h-3 inline" />
                            </a>
                        @endif
                        @if(!empty($item['links']))
                            <ul class="list-unstyled mt-2">
                                @foreach($item['links'] as $link)
                                    <li class="mb-1">
                                        <a href="{{ $link['url'] ?? '#' }}" class="text-primary small">
                                            <x-filament::icon icon="heroicon-o-chevron-right" class="w-3 h-3 inline" />
                                            {{ $link['title'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if(!empty($other_topics))
        <div class="row mt-4">
            <div class="col-12">
                @foreach($other_topics as $topic)
                    <a href="{{ $show_all_url ?? '#' }}" class="badge bg-primary text-white me-2 mb-2 p-2">{{ $topic }}</a>
                @endforeach
            </div>
        </div>
        @endif

        @if($show_all_url)
        <div class="row mt-4">
            <div class="col-12 text-end">
                <a href="{{ $show_all_url }}" class="btn btn-outline-primary">
                    Altri argomenti
                    <x-filament::icon icon="heroicon-o-arrow-right" class="w-4 h-4 inline ms-1" />
                </a>
            </div>
        </div>
        @endif
    </div>
</section>
