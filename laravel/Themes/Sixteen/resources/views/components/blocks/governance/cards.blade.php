{{--
    Governance Cards + Events Calendar
    Reference: design-comuni-pagine-statiche/sito/homepage.html #calendario
--}}
@props(['data' => []])
@php
    $cards = $data['cards'] ?? [];
    $month = $data['month'] ?? '';
    $slides = $data['slides'] ?? [];
@endphp

<section id="calendario">
    <div class="section section-muted pb-90 pb-lg-50 px-lg-5 pt-0">
        <div class="container">
            <div class="row g-4 mb-4">
                @foreach ($cards as $i => $card)
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-teaser no-after rounded shadow-sm border border-light h-100">
                            <div class="card-body p-3">
                                <div class="category-top mb-2">
                                    <span class="title-xsmall-semi-bold fw-semibold text-uppercase text-secondary">{{ $card['category'] ?? 'Organi di governo' }}</span>
                                </div>

                                @if ($i === 0 && !empty($card['image']))
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1 pe-3">
                                            <h3 class="title-medium-2-bold mb-1">{{ $card['title'] ?? '' }}</h3>
                                            <p class="text-paragraph-small text-secondary mb-0">{{ $card['role'] ?? '' }}</p>
                                        </div>
                                        <div class="card-thumb flex-shrink-0">
                                            <img src="{{ $card['image'] }}" alt="{{ $card['title'] ?? '' }}" class="rounded" width="80" height="80">
                                        </div>
                                    </div>
                                @else
                                    <h3 class="title-medium-2-bold mb-1">{{ $card['title'] ?? '' }}</h3>
                                    <p class="text-paragraph-small text-secondary mb-0">{{ $card['description'] ?? '' }}</p>
                                @endif
                            </div>
                            <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-3">
                                <a class="read-more" href="{{ $card['url'] ?? '#' }}">
                                    <span class="text title-xxsmall-semi-bold text-uppercase">Vai alla pagina</span>
                                    <svg class="icon icon-sm ms-1">
                                        <use href="{{ asset('themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-arrow-right') }}"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Events Calendar --}}
            <div class="row row-title pt-5 pt-lg-60 pb-3">
                <div class="col-12">
                    <h2 class="title-xlarge">Eventi</h2>
                </div>
            </div>
            <div class="row row-calendar">
                <div class="it-carousel-wrapper it-carousel-landscape-abstract-four-cols it-calendar-wrapper splide" data-bs-carousel-splide>
                    <div class="it-header-block">
                        <div class="it-header-block-title">
                            <h3 class="mb-0 text-center home-carousel-title text-white text-uppercase title-xsmall-bold">{{ $month }}</h3>
                        </div>
                    </div>
                    <div class="splide__track">
                        <ul class="splide__list it-carousel-all">
                            @foreach ($slides as $slide)
                                <li class="splide__slide">
                                    <div class="it-single-slide-wrapper h-100">
                                        <div class="card-wrapper h-100">
                                            <div class="card card-bg">
                                                <div class="card-body">
                                                    <h4 class="calendar-day-title">
                                                        {{ $slide['day'] }}<span>{{ $slide['weekday'] }}</span>
                                                    </h4>
                                                    <ul class="calendar-events">
                                                        @foreach ($slide['events'] ?? [] as $event)
                                                            <li class="calendar-event">
                                                                @if (!empty($event['image']))
                                                                    <div class="d-flex align-items-start">
                                                                        <img src="{{ $event['image'] }}" alt="" class="event-thumb rounded me-2">
                                                                        <a href="{{ $event['url'] ?? '#' }}" class="event-link">{{ $event['title'] }}</a>
                                                                    </div>
                                                                @else
                                                                    <a href="{{ $event['url'] ?? '#' }}" class="event-link">{{ $event['title'] }}</a>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
