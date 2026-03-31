@props(['month' => '', 'year' => '', 'events' => []])

{{-- Events Calendar - Bootstrap Italia Style --}}
<section class="events-section py-8">
    <div class="container">
        <h2 class="title-xxlarge mb-2">EVENTI</h2>
        <h3 class="text-muted mb-6">{{ $month }} {{ $year }}</h3>
        
        <div class="events-calendar">
            <div class="row g-3">
                @foreach($events as $event)
                <div class="col-12">
                    <div class="calendar-day d-flex gap-3 p-3 border-bottom">
                        <div class="day-badge text-center" style="min-width: 80px;">
                            <span class="day h3 mb-0 text-primary fw-bold">{{ $event['day'] }}</span>
                            <span class="weekday text-uppercase small">{{ $event['weekday'] }}</span>
                        </div>
                        <div class="events-list flex-grow-1">
                            <ul class="list-unstyled mb-0">
                                @foreach($event['items'] as $item)
                                <li>
                                    <a href="{{ $item['url'] ?? '#' }}" class="text-decoration-none">
                                        {{ $item['title'] }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
