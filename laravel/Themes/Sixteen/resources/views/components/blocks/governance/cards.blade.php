{{-- Governance Cards - Mayor, Council, etc. --}}
@props([
    'title' => 'Organi di governo',
    'items' => [],
])

<section class="py-8">
    <div class="container">
        {{-- Section Title --}}
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="title-xxlarge mb-0">{{ $title }}</h2>
            </div>
        </div>
        
        {{-- Cards Grid --}}
        <div class="row g-4">
            @foreach($items as $item)
            <div class="col-12 col-md-4">
                <div class="card card-bg shadow-sm h-100">
                    <div class="card-body p-4">
                        <h3 class="card-title h5 mb-2">
                            <a href="{{ $item['url'] ?? '#' }}" class="text-decoration-none text-dark stretched-link">
                                {{ $item['title'] }}
                            </a>
                        </h3>
                        
                        @if(isset($item['name']))
                        <p class="text-muted mb-3">{{ $item['name'] }}</p>
                        @endif
                        
                        <a href="{{ $item['url'] ?? '#' }}" class="read-more text-primary font-weight-bold text-decoration-none">
                            Vai alla pagina
                            <x-filament::icon icon="heroicon-o-arrow-right" class="w-4 h-4 inline ms-1" />
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
