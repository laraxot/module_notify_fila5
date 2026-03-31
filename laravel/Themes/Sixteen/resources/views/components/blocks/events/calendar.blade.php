{{-- Events Calendar - Design Comuni Style --}}
@props([
    'month' => '',
    'year' => '',
    'events' => [],
])

<section class="py-8 bg-light">
    <div class="container">
        {{-- Section Title --}}
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="title-xxlarge mb-0">EVENTI</h2>
            </div>
        </div>
        
        {{-- Calendar --}}
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="h5 mb-0">{{ $month }} {{ $year }}</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-unstyled mb-0">
                            @foreach($events as $event)
                            <li class="border-bottom">
                                <a href="{{ $event['url'] ?? '#' }}" class="d-block p-3 text-decoration-none text-dark hover-bg-light">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold text-primary">{{ $event['date'] ?? '' }}</span>
                                        <span class="text-muted small">{{ $event['title'] ?? '' }}</span>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
