{{-- Thematic Sites Links --}}
@props([
    'title' => 'SITI TEMATICI',
    'items' => [],
])

<section class="py-8 bg-light">
    <div class="container">
        {{-- Section Title --}}
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="title-xxlarge mb-0">{{ $title }}</h2>
            </div>
        </div>
        
        {{-- Thematic Sites Grid --}}
        <div class="row g-4">
            @foreach($items as $item)
            <div class="col-12 col-md-4">
                <div class="card card-bg shadow-sm h-100">
                    <div class="card-body p-4 text-center">
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
    </div>
</section>
