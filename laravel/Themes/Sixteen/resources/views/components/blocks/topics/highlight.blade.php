{{-- Topics Highlight Grid --}}
@props([
    'title' => 'ARGOMENTI IN EVIDENZA',
    'items' => [],
    'show_all_url' => '',
])

<section class="py-8">
    <div class="container">
        {{-- Section Title --}}
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="title-xxlarge mb-0">{{ $title }}</h2>
            </div>
        </div>
        
        {{-- Topics Grid --}}
        <div class="row g-4">
            @foreach($items as $item)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-bg shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        @if(isset($item['icon']))
                        <div class="mb-3">
                            <x-filament::icon 
                                icon="heroicon-o-{{ $item['icon'] }}" 
                                class="w-12 h-12 text-primary mx-auto" 
                            />
                        </div>
                        @endif
                        
                        <h3 class="card-title h5 mb-0">
                            <a href="{{ $item['url'] ?? '#' }}" class="text-decoration-none text-dark stretched-link">
                                {{ $item['title'] }}
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        {{-- Show All Link --}}
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
