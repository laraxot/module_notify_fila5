{{-- Events Calendar - Bootstrap Italia Style --}}
{{-- Reference: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html --}}
@props([
    'title' => 'Eventi',
    'month' => '',
    'items' => [],
])

<section class="py-5">
    <div class="container">
        {{-- Header --}}
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="section-title mb-2">{{ $title }}</h2>
                @if($month)
                <h3 class="text-muted mb-4">{{ $month }}</h3>
                @endif
            </div>
        </div>
        
        {{-- Calendar List --}}
        <div class="row">
            <div class="col-12">
                <div class="calendar-list">
                    @foreach($items as $day)
                    <div class="calendar-event mb-3 pb-3 border-bottom">
                        <div class="row">
                            <div class="col-3 col-md-2">
                                <span class="calendar-date text-primary h3 mb-0 d-block">{{ $day['day'] ?? '' }}</span>
                                <span class="calendar-day text-muted small text-uppercase">{{ $day['weekday'] ?? '' }}</span>
                            </div>
                            <div class="col-9 col-md-10">
                                <ul class="event-list list-unstyled mb-0">
                                    @forelse($day['events'] ?? [] as $event)
                                    <li class="mb-2">
                                        <a href="{{ $event['url'] ?? '#' }}" class="text-decoration-none">
                                            {{ $event['title'] ?? '' }}
                                        </a>
                                    </li>
                                    @empty
                                    <li class="text-muted italic">Nessun evento</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                {{-- Vai al calendario --}}
                <div class="text-center mt-4">
                    <a href="/it/eventi" class="btn btn-outline-primary">
                        Vai al calendario eventi
                        <svg class="icon icon-xs ms-1" aria-hidden="true">
                            <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-chevron-right"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
