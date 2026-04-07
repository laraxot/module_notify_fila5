{{--
    Governance Cards + Events Calendar
    Reference: design-comuni-pagine-statiche/sito/homepage.html #calendario
--}}
@props(['data' => []])
@php
<<<<<<< HEAD
    $cards  = $data['cards'] ?? [];
    $month  = $data['month'] ?? '';
=======
    $cards = $data['cards'] ?? [];
    $month = $data['month'] ?? '';
>>>>>>> origin/dev
    $slides = $data['slides'] ?? [];
@endphp

<section id="calendario">
    <div class="section section-muted pb-90 pb-lg-50 px-lg-5 pt-0">
        <div class="container">
<<<<<<< HEAD
            <div class="row mb-2">
                <div class="card-wrapper px-0 card-overlapping card-teaser-wrapper card-teaser-wrapper-equal card-teaser-block-3">
                    @foreach($cards as $i => $card)
                    @if($i === 0)
                    <div class="card card-teaser card-teaser-image card-flex no-after rounded shadow-sm border border-light mb-0">
                        <div class="card-image-wrapper with-read-more">
                            <div class="card-body p-3 pb-5">
                                <div class="category-top">
                                    <span class="title-xsmall-semi-bold fw-semibold">{{ $card['category'] ?? 'Organi di governo' }}</span>
                                </div>
                                <h3 class="card-title text-paragraph-medium u-grey-light">{{ $card['title'] ?? '' }}</h3>
                                <p class="card-text text-paragraph-card u-grey-light m-0">{{ $card['role'] ?? '' }}</p>
                            </div>
                            <div class="card-image card-image-rounded pb-5">
                                <img src="{{ $card['image'] ?? 'https://picsum.photos/150/200' }}" alt="{{ $card['title'] ?? '' }}">
                            </div>
                        </div>
                        <a class="read-more ps-3" href="{{ $card['url'] ?? '#' }}">
                            <span class="text">Vai alla pagina</span>
                            <svg class="icon"><use href="{{ asset('themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-arrow-right') }}"></use></svg>
                        </a>
                    </div>
                    @else
                    <div class="card card-teaser no-after rounded shadow-sm mb-0 border border-light">
                        <div class="card-body pb-5">
                            <div class="category-top">
                                <span class="title-xsmall-semi-bold fw-semibold">{{ $card['category'] ?? 'Organi di governo' }}</span>
                            </div>
                            <h3 class="card-title text-paragraph-medium u-grey-light">{{ $card['title'] ?? '' }}</h3>
                            <p class="card-text text-paragraph-card u-grey-light m-0">{{ $card['description'] ?? '' }}</p>
                        </div>
                        <a class="read-more" href="{{ $card['url'] ?? '#' }}">
                            <span class="text">Vai alla pagina</span>
                            <svg class="icon ms-0"><use href="{{ asset('themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-arrow-right') }}"></use></svg>
                        </a>
                    </div>
                    @endif
                    @endforeach
                </div>
=======
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
>>>>>>> origin/dev
            </div>

            {{-- Events Calendar --}}
            <div class="row row-title pt-5 pt-lg-60 pb-3">
<<<<<<< HEAD
                <div class="col-12 d-lg-flex justify-content-between">
                    <h2>Eventi</h2>
=======
                <div class="col-12">
                    <h2 class="title-xlarge">Eventi</h2>
>>>>>>> origin/dev
                </div>
            </div>
            <div class="row row-calendar">
                <div class="it-carousel-wrapper it-carousel-landscape-abstract-four-cols it-calendar-wrapper splide" data-bs-carousel-splide>
                    <div class="it-header-block">
                        <div class="it-header-block-title">
<<<<<<< HEAD
                            <h3 class="mb-0 text-center home-carousel-title">{{ $month }}</h3>
=======
                            <h3 class="mb-0 text-center home-carousel-title text-white text-uppercase title-xsmall-bold">{{ $month }}</h3>
>>>>>>> origin/dev
                        </div>
                    </div>
                    <div class="splide__track">
                        <ul class="splide__list it-carousel-all">
<<<<<<< HEAD
                            @foreach($slides as $slide)
                            <li class="splide__slide">
                                <div class="it-single-slide-wrapper h-100">
                                    <div class="card-wrapper h-100">
                                        <div class="card card-bg">
                                            <div class="card-body">
                                                <h4 class="card-title pb-4 mb-10 text-secondary">{{ $slide['day'] }}<span>{{ $slide['weekday'] }}</span></h4>
                                                @foreach($slide['events'] ?? [] as $event)
                                                @if(!empty($event['image']))
                                                <p class="card-text px-2 pb-10 mb-10 d-flex">
                                                    <img src="{{ $event['image'] }}" alt="random image" class="me-3 rounded">
                                                    <a href="{{ $event['url'] ?? '#' }}">{{ $event['title'] }}</a>
                                                </p>
                                                @else
                                                <p class="card-text px-2 pb-10 mb-10"><a href="{{ $event['url'] ?? '#' }}">{{ $event['title'] }}</a></p>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
=======
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
>>>>>>> origin/dev
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
