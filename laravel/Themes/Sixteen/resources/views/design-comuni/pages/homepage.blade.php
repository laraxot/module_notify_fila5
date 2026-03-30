{{--
    |--------------------------------------------------------------------------
    | Homepage - Design Comuni
    |--------------------------------------------------------------------------
    |
    | Homepage template using Design Comuni components.
    | Based on Bootstrap Italia design system.
    |
    | @package Design Comuni
    | @subpackage Pages
    | @version 1.0.0
    |
--}}

@extends('design-comuni.layouts.main')

@section('title', config('design-comuni.municipality_name') . ' - Homepage')

@section('meta_description', 'Sito ufficiale del ' . config('design-comuni.municipality_name'))

@section('content')

{{-- Main Container --}}
<div class="container px-4 my-4">
    
    {{-- Hero Section --}}
    <section id="head-section">
        <h2 class="visually-hidden">Contenuti in evidenza</h2>
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1">
                @include('design-comuni.components.card-standard', [
                    'title' => "Parte l'estate con oltre 300 eventi in centro e nei quartieri, tutti gli eventi previsti",
                    'text' => '<strong>Inaugurazione lunedì 2 luglio</strong> con il concerto gratuito in piazza XX Settembre degli Sweet Soul Music Revue. Sul palco 20 musicisti dal tutto il mondo',
                    'link' => route('sito.novita-dettaglio', 1),
                    'linkText' => 'Tutte le novità',
                    'category' => 'Notizie',
                    'categoryIcon' => 'it-calendar',
                    'date' => '18 mag 2022',
                    'tags' => ['Estate in città'],
                ])
            </div>
            <div class="col-lg-6 order-1 order-lg-2 px-0 px-lg-3">
                <img src="https://picsum.photos/800/600" 
                     title="Immagine in evidenza" 
                     alt="Descrizione immagine" 
                     class="img-fluid"
                     loading="lazy">
            </div>
        </div>
    </section>
    
    {{-- Administration Section --}}
    <section id="calendario">
        <div class="section section-muted pb-90 pb-lg-50 px-lg-5 pt-0">
            <div class="container">
                <div class="row mb-2">
                    <div class="card-wrapper px-0 card-overlapping card-teaser-wrapper card-teaser-wrapper-equal card-teaser-block-3">
                        
                        {{-- Mayor Card --}}
                        @include('design-comuni.components.card-teaser', [
                            'title' => 'Mario Rossi',
                            'description' => 'Il Sindaco della città',
                            'link' => route('sito.amministrazione'),
                            'image' => 'https://picsum.photos/150/200',
                        ])
                        
                        {{-- Government Card 1 --}}
                        @include('design-comuni.components.card-teaser', [
                            'title' => 'La giunta comunale',
                            'description' => 'La giunta, nominata dal sindaco, esercita collegialmente le funzioni ad essa attribuite dalla legge.',
                            'link' => route('sito.amministrazione'),
                        ])
                        
                        {{-- Government Card 2 --}}
                        @include('design-comuni.components.card-teaser', [
                            'title' => 'Il consiglio comunale',
                            'description' => 'Il Consiglio è un organo collegiale ed elettivo che rimane in carica per 5 anni.',
                            'link' => route('sito.amministrazione'),
                        ])
                        
                    </div>
                </div>
                
                {{-- Events Section --}}
                <div class="row row-title pt-5 pt-lg-60 pb-3">
                    <div class="col-12 d-lg-flex justify-content-between">
                        <h2>Eventi</h2>
                    </div>
                </div>
                
                {{-- Calendar Carousel --}}
                <div class="row row-calendar">
                    <div class="it-carousel-wrapper it-carousel-landscape-abstract-four-cols it-calendar-wrapper splide" data-bs-carousel-splide>
                        <div class="it-header-block">
                            <div class="it-header-block-title">
                                <h3 class="mb-0 text-center home-carousel-title">Settembre 2022</h3>
                            </div>
                        </div>
                        <div class="splide__track">
                            <ul class="splide__list it-carousel-all">
                                @foreach(range(15, 21) as $day)
                                <li class="splide__slide">
                                    <div class="it-single-slide-wrapper h-100">
                                        <div class="card-wrapper h-100">
                                            @include('design-comuni.components.card-bg', [
                                                'date' => $day,
                                                'day' => date('D', mktime(0, 0, 0, 9, $day, 2022)),
                                                'events' => [
                                                    ['title' => 'Saldo TASI', 'link' => '#'],
                                                    ['title' => 'Concerto gratuito piazza XXIV maggio', 'link' => '#', 'image' => 'https://picsum.photos/200'],
                                                    ['title' => 'Convocazione Consiglio Comunale', 'link' => '#'],
                                                ],
                                            ])
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
    
    {{-- Featured Topics Section --}}
    <section class="evidence-section">
        <div class="section py-5 pb-lg-80 px-lg-5 position-relative" style="background-image: url(../assets/images/evidenza-header.png)">
            <div class="container">
                <div class="row">
                    <h2 class="text-white">Argomenti in evidenza</h2>
                </div>
                <div class="card-wrapper card-teaser-wrapper card-teaser-wrapper-equal card-teaser-block-3">
                    
                    {{-- Topic 1: Transport --}}
                    @include('design-comuni.components.card-teaser', [
                        'title' => 'Trasporto pubblico',
                        'description' => 'Informazioni sui servizi di trasporto pubblico e servizi taxi',
                        'link' => route('sito.argomento', 'trasporto-pubblico'),
                        'innerCard' => '
                            <a href="#" class="card card-teaser card-bg-blue no-after rounded mt-0 p-3">
                                <div class="avatar size-lg me-3">
                                    <img src="https://picsum.photos/200/200" alt="Immagine">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title text-white mb-1">Mobilità in Comune</h4>
                                    <p class="card-text text-sans-serif text-white">Il sito del turismo del Comune e della Città Metropolitana.</p>
                                </div>
                            </a>
                        ',
                    ])
                    
                    {{-- Topic 2: Pets --}}
                    @include('design-comuni.components.card-teaser', [
                        'title' => 'Animale domestico',
                        'description' => 'Informazioni sui servizi e le norme previste dal comune per gli animali domestici.',
                        'link' => route('sito.argomento', 'animale-domestico'),
                        'links' => [
                            ['label' => 'Come adottare un cane al Canile Municipale', 'url' => '#'],
                            ['label' => 'Elenco delle aree per cani', 'url' => '#'],
                            ['label' => 'Come segnalare una colonia felina', 'url' => '#'],
                        ],
                    ])
                    
                    {{-- Topic 3: Sports --}}
                    @include('design-comuni.components.card-teaser', [
                        'title' => 'Sport',
                        'description' => 'Tutto quello che c'è da sapere sulle strutture sportive comunali.',
                        'link' => route('sito.argomento', 'sport'),
                        'links' => [
                            ['label' => 'Tutte le strutture sportive della città', 'url' => '#'],
                            ['label' => 'Da lunedì 3 settembre chiudono le vasche', 'url' => '#'],
                            ['label' => 'Concessione di contributi sportivi', 'url' => '#'],
                        ],
                    ])
                    
                </div>
                
                {{-- More Topics Tags --}}
                <div class="row pt-30">
                    <div class="col-lg-10 col-xl-6 offset-lg-1 offset-xl-2">
                        <div class="row d-lg-inline-flex">
                            <div class="col-lg-3">
                                <h3 class="text-uppercase mb-3 title-xsmall-bold text text-secondary">Altri argomenti</h3>
                            </div>
                            <div class="col-lg-9">
                                <ul class="d-flex flex-wrap gap-1">
                                    @foreach(['Associazioni', 'Concorsi', 'Energie rinnovabili', 'Gestione rifiuti', 'Imposte', 'Istruzione', 'Pista ciclabile', 'Parchi e giardini'] as $tag)
                                    <li>
                                        <a class="chip chip-simple" href="{{ route('sito.argomenti') }}">
                                            <span class="chip-label">{{ $tag }}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
</div>

@endsection

@push('foot-scripts')
<script>
    // Initialize carousel
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Splide !== 'undefined') {
            new Splide('.splide', {
                type: 'loop',
                perPage: 4,
                breakpoints: {
                    768: { perPage: 1 },
                    992: { perPage: 2 }
                }
            }).mount();
        }
    });
</script>
@endpush
