{{--
    |--------------------------------------------------------------------------
    | Card BG Component - Design Comuni
    |--------------------------------------------------------------------------
    |
    | Background card for calendar events and listings.
    |
    | Usage:
    | @include('design-comuni.components.card-bg', [
    |     'date' => '15',
    |     'day' => 'lun',
    |     'events' => [
    |         ['title' => 'Event 1', 'link' => '#'],
    |         ['title' => 'Event 2', 'link' => '#', 'image' => asset('img.jpg')],
    |     ],
    | ])
    |
    | @package Design Comuni
    | @subpackage Components
    | @version 1.0.0
    |
--}}

@props([
    'date' => '',
    'day' => '',
    'events' => [],
    'link' => '#',
])

<div class="card card-bg">
    <div class="card-body">
        {{-- Date Header --}}
        @if($date)
        <h4 class="card-title pb-4 mb-10 text-secondary">
            {{ $date }}
            @if($day)
            <span>{{ $day }}</span>
            @endif
        </h4>
        @endif
        
        {{-- Events List --}}
        @if(count($events) > 0)
        @foreach($events as $index => $event)
        <p class="card-text px-2 pb-10 mb-10 @if(isset($event['image']))d-flex@endif">
            @if(isset($event['image']))
            <img src="{{ $event['image'] }}" 
                 alt="{{ $event['title'] ?? 'Event image' }}" 
                 class="me-3 rounded"
                 loading="lazy">
            @endif
            <a href="{{ $event['link'] ?? '#' }}">{{ $event['title'] ?? 'Event' }}</a>
        </p>
        @endforeach
        @endif
    </div>
</div>
