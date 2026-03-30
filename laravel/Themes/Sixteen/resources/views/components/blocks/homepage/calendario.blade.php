@php
    $sprite = asset('themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg');
    $governmentCards = $governmentCards ?? [
        [
            'category' => 'Organi di governo',
            'title' => 'Mario Rossi',
            'description' => 'Il Sindaco della citta',
            'url' => '#',
            'image' => 'https://picsum.photos/150/200',
            'image_card' => true,
        ],
        [
            'category' => 'Organi di governo',
            'title' => 'La giunta comunale',
            'description' => 'La giunta, nominata dal sindaco, esercita collegialmente le funzioni ad essa attribuite dalla legge.',
            'url' => '#',
            'image_card' => false,
        ],
        [
            'category' => 'Organi di governo',
            'title' => 'Il consiglio comunale',
            'description' => 'Il Consiglio e un organo collegiale ed elettivo che rimane in carica per 5 anni.',
            'url' => '#',
            'image_card' => false,
        ],
    ];
    $days = $days ?? [
        ['day' => '15', 'weekday' => 'lun', 'items' => [['title' => 'Saldo TASI'], ['title' => 'Concerto gratuito piazza XXIV maggio', 'image' => 'https://picsum.photos/200'], ['title' => 'Convocazione Consiglio Comunale - Prima seduta'], ['title' => 'Seconda rata TARI']]],
        ['day' => '16', 'weekday' => 'mar', 'items' => [['title' => 'Presentazione mostra Mediterraneo'], ['title' => 'Convocazione Consiglio Comunale - Seconda seduta', 'image' => 'https://picsum.photos/200']]],
        ['day' => '17', 'weekday' => 'mar', 'items' => [['title' => 'Presentazione piano lavori pubblici 2018']]],
        ['day' => '18', 'weekday' => 'mar', 'items' => [['title' => 'Evento La notte bianca dei bambini'], ['title' => 'Concerto della Banda Civica in piazza San Vittore']]],
    ];
@endphp
<section id="calendario">
    <div class="section section-muted pb-90 pb-lg-50 px-lg-5 pt-0">
        <div class="container">
            <div class="row mb-2">
                <div class="card-wrapper px-0 card-overlapping card-teaser-wrapper card-teaser-wrapper-equal card-teaser-block-3">
                    @foreach ($governmentCards as $card)
                        @if ($card['image_card'])
                            <div class="card card-teaser card-teaser-image card-flex no-after rounded shadow-sm border border-light mb-0">
                                <div class="card-image-wrapper with-read-more">
                                    <div class="card-body p-3 pb-5">
                                        <div class="category-top">
                                            <span class="title-xsmall-semi-bold fw-semibold">{{ $card['category'] }}</span>
                                        </div>
                                        <h3 class="card-title text-paragraph-medium u-grey-light">{{ $card['title'] }}</h3>
                                        <p class="text-paragraph-card u-grey-light m-0">{{ $card['description'] }}</p>
                                    </div>
                                    <div class="card-image card-image-rounded pb-5">
                                        <img src="{{ $card['image'] }}" alt="Immagine di esempio" />
                                    </div>
                                </div>
                                <a class="read-more ps-3" href="{{ $card['url'] }}">
                                    <span class="text">Vai alla pagina</span>
                                    <svg class="icon"><use xlink:href="{{ $sprite }}#it-arrow-right"></use></svg>
                                </a>
                            </div>
                        @else
                            <div class="card card-teaser no-after rounded shadow-sm mb-0 border border-light">
                                <div class="card-body pb-5">
                                    <div class="category-top">
                                        <span class="title-xsmall-semi-bold fw-semibold">{{ $card['category'] }}</span>
                                    </div>
                                    <h3 class="card-title text-paragraph-medium u-grey-light">{{ $card['title'] }}</h3>
                                    <p class="text-paragraph-card u-grey-light m-0">{{ $card['description'] }}</p>
                                </div>
                                <a class="read-more" href="{{ $card['url'] }}">
                                    <span class="text">Vai alla pagina</span>
                                    <svg class="icon ms-0"><use xlink:href="{{ $sprite }}#it-arrow-right"></use></svg>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row row-title pt-5 pt-lg-60 pb-3">
                <div class="col-12 d-lg-flex justify-content-between"><h2>Eventi</h2></div>
            </div>
            <div class="row row-calendar">
                <div class="it-carousel-wrapper it-carousel-landscape-abstract-four-cols it-calendar-wrapper splide" data-bs-carousel-splide>
                    <div class="it-header-block">
                        <div class="it-header-block-title"><h3 class="mb-0 text-center home-carousel-title">Settembre 2022</h3></div>
                    </div>
                    <div class="splide__track">
                        <ul class="splide__list it-carousel-all">
                            @foreach ($days as $day)
                                <li class="splide__slide">
                                    <div class="it-single-slide-wrapper h-100">
                                        <div class="card-wrapper h-100">
                                            <div class="card card-bg">
                                                <div class="card-body">
                                                    <h4 class="card-title pb-4 mb-10 text-secondary">{{ $day['day'] }}<span>{{ $day['weekday'] }}</span></h4>
                                                    @foreach ($day['items'] as $item)
                                                        @if (isset($item['image']))
                                                            <p class="card-text px-2 pb-10 mb-10 d-flex">
                                                                <img src="{{ $item['image'] }}" alt="random image" class="me-3 rounded">
                                                                <a href="#">{{ $item['title'] }}</a>
                                                            </p>
                                                        @else
                                                            <p class="card-text px-2 pb-10 mb-10"><a href="#">{{ $item['title'] }}</a></p>
                                                        @endif
                                                    @endforeach
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
