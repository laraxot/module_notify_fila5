<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.homepage');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = 'tests.homepage';
    public array $data = [];

    public function getFeaturedServices(): array
    {
        return [
            ['title' => 'Servizi Digitali', 'description' => 'Accedi ai servizi online del Comune', 'url' => '#', 'icon' => 'heroicon-o-computer-desktop'],
            ['title' => 'Amministrazione', 'description' => 'Giunta, consiglio e organi di governo', 'url' => '/it/tests/amministrazione', 'icon' => 'heroicon-o-building-office'],
            ['title' => 'Novità', 'description' => 'Comunicati, avvisi e notizie', 'url' => '/it/tests/novita', 'icon' => 'heroicon-o-newspaper'],
            ['title' => 'Servizi', 'description' => 'Tutti i servizi del Comune', 'url' => '/it/tests/servizi', 'icon' => 'heroicon-o-briefcase'],
            ['title' => 'Eventi', 'description' => 'Eventi e iniziative', 'url' => '/it/tests/eventi', 'icon' => 'heroicon-o-calendar-days'],
            ['title' => 'Turismo', 'description' => 'Scopri il territorio', 'url' => '#', 'icon' => 'heroicon-o-map'],
        ];
    }

    public function getTopics(): array
    {
        return [
            ['title' => 'Iscrizioni', 'description' => 'Servizi per iscrizioni e registrazioni', 'url' => '#', 'icon' => 'heroicon-o-pencil-square'],
            ['title' => 'Estate in città', 'description' => 'Eventi e iniziative estive', 'url' => '#', 'icon' => 'heroicon-o-sun'],
            ['title' => 'Polizia locale', 'description' => 'Informazioni e servizi', 'url' => '#', 'icon' => 'heroicon-o-shield-check'],
            ['title' => 'Mobilità', 'description' => 'Trasporti e parcheggi', 'url' => '#', 'icon' => 'heroicon-o-truck'],
            ['title' => 'Cultura', 'description' => 'Eventi culturali e musei', 'url' => '#', 'icon' => 'heroicon-o-book-open'],
            ['title' => 'Sport', 'description' => 'Impianti e attività sportive', 'url' => '#', 'icon' => 'heroicon-o-trophy'],
            ['title' => 'Ambiente', 'description' => 'Qualità ambientale e monitoraggi', 'url' => '#', 'icon' => 'heroicon-o-leaf'],
            ['title' => 'Salute', 'description' => 'Servizi sanitari e benessere', 'url' => '#', 'icon' => 'heroicon-o-heart'],
        ];
    }

    public function getLatestNews(): array
    {
        return [
            ['title' => 'Parte l\'estate con oltre 300 eventi', 'excerpt' => 'Inaugurazione lunedì 2 luglio con il concerto gratuito in piazza.', 'date' => '18 Mag 2026', 'url' => '#'],
            ['title' => 'Nuovo orario uffici comunali', 'excerpt' => 'Dal 1 giugno il nuovo orario di apertura al pubblico.', 'date' => '15 Mag 2026', 'url' => '#'],
            ['title' => 'Bandi pubblicati', 'excerpt' => 'Disponibili i nuovi bandi per contributi alle associazioni.', 'date' => '10 Mag 2026', 'url' => '#'],
        ];
    }

    public function getEvents(): array
    {
        return [
            ['title' => 'Concerto gratuito in piazza', 'description' => 'Piazza XX Settembre - Ore 21:00', 'date' => '20 Giu 2026', 'url' => '#'],
            ['title' => 'Mostra "Mediterraneo"', 'description' => 'Galleria d\'arte - Inaugurazione', 'date' => '25 Giu 2026', 'url' => '#'],
            ['title' => 'Notte bianca dei bambini', 'description' => 'Centro storico - Attività per bambini', 'date' => '30 Giu 2026', 'url' => '#'],
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.homepage')
    <div class="homepage-wrapper">
        {{-- Skip Links --}}
        <a class="skiplinks" href="#main">Vai al contenuto principale</a>

        {{-- Header --}}
        <x-section slug="header" :data="$headerData ?? []" />

        {{-- Main Content --}}
        <main class="container" id="main">
            
            {{-- Hero Section --}}
            <section class="hero-section py-12">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="title-xxxlarge mb-4">NOME DEL COMUNE</h1>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Featured News (Contenuti in Evidenza) --}}
            <section class="featured-news py-8">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-8">
                            <article class="card-wrapper card-space">
                                <div class="card card-bg">
                                    <div class="card-body">
                                        <span class="card-date text-muted">18 mag 2026</span>
                                        <h2 class="card-title h4 mt-2">
                                            PARTE L'ESTATE CON OLTRE 300 EVENTI IN CENTRO E NEI QUARTIERI
                                        </h2>
                                        <p class="card-text mt-3">
                                            Inaugurazione lunedì 2 luglio con il concerto gratuito in piazza XX Settembre 
                                            degli Sweet Soul Music Revue. Sul palco 20 musicisti da tutto il mondo.
                                        </p>
                                        <a href="#" class="read-more text-primary fw-semibold text-decoration-none">
                                            <span>Estate in città - Tutte le novità</span>
                                            <x-filament::icon icon="heroicon-o-arrow-right" class="icon-sm ms-2" />
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Featured Services (Servizi in Evidenza) --}}
            <section class="featured-services py-8">
                <div class="container">
                    <h2 class="title-xxlarge mb-6">Servizi in evidenza</h2>
                    <div class="row g-4">
                        @foreach($this->getFeaturedServices() as $service)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card-wrapper card-space">
                                <div class="card card-bg">
                                    <div class="card-body">
                                        <h3 class="card-title h5">
                                            <x-filament::icon :icon="$service['icon']" class="icon-primary me-2" style="width: 24px; height: 24px;" />
                                            {{ $service['title'] }}
                                        </h3>
                                        <p class="card-text mt-2">{{ $service['description'] }}</p>
                                        <a href="{{ $service['url'] }}" class="read-more text-primary fw-semibold text-decoration-none mt-3 d-inline-flex align-items-center">
                                            <span>Leggi di più</span>
                                            <x-filament::icon icon="heroicon-o-arrow-right" class="icon-sm ms-2" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- Explore by Topic (Esplora per Argomento) --}}
            <section class="topics-section py-8">
                <div class="container">
                    <h2 class="title-xxlarge mb-6">Esplora per argomento</h2>
                    <div class="row g-4">
                        @foreach($this->getTopics() as $topic)
                        <div class="col-12 col-md-6">
                            <div class="card-wrapper card-space">
                                <div class="card card-bg">
                                    <div class="card-body">
                                        <h3 class="card-title h5">
                                            <x-filament::icon :icon="$topic['icon']" class="icon-primary me-2" style="width: 24px; height: 24px;" />
                                            {{ $topic['title'] }}
                                        </h3>
                                        <p class="card-text mt-2">{{ $topic['description'] }}</p>
                                        <a href="{{ $topic['url'] }}" class="read-more text-primary fw-semibold text-decoration-none mt-3 d-inline-flex align-items-center">
                                            <span>Esplora argomento</span>
                                            <x-filament::icon icon="heroicon-o-arrow-right" class="icon-sm ms-2" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- Latest News (Ultime Notizie) --}}
            <section class="latest-news py-8">
                <div class="container">
                    <h2 class="title-xxlarge mb-6">Ultime notizie</h2>
                    <div class="row g-4">
                        @foreach($this->getLatestNews() as $news)
                        <div class="col-12 col-md-6 col-lg-4">
                            <article class="card-wrapper card-space">
                                <div class="card card-bg">
                                    <div class="card-body">
                                        <span class="card-date text-muted">{{ $news['date'] }}</span>
                                        <h3 class="card-title h5 mt-2">{{ $news['title'] }}</h3>
                                        <p class="card-text mt-2">{{ $news['excerpt'] }}</p>
                                        <a href="{{ $news['url'] }}" class="read-more text-primary fw-semibold text-decoration-none mt-3 d-inline-flex align-items-center">
                                            <span>Leggi di più</span>
                                            <x-filament::icon icon="heroicon-o-arrow-right" class="icon-sm ms-2" />
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- Events (Eventi) --}}
            <section class="events-section py-8">
                <div class="container">
                    <h2 class="title-xxlarge mb-6">Eventi</h2>
                    <div class="row g-4">
                        @foreach($this->getEvents() as $event)
                        <div class="col-12 col-md-6 col-lg-4">
                            <article class="card-wrapper card-space">
                                <div class="card card-bg">
                                    <div class="card-body">
                                        <span class="card-date text-muted">{{ $event['date'] }}</span>
                                        <h3 class="card-title h5 mt-2">{{ $event['title'] }}</h3>
                                        <p class="card-text mt-2">{{ $event['description'] }}</p>
                                        <a href="{{ $event['url'] }}" class="read-more text-primary fw-semibold text-decoration-none mt-3 d-inline-flex align-items-center">
                                            <span>Scopri di più</span>
                                            <x-filament::icon icon="heroicon-o-arrow-right" class="icon-sm ms-2" />
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

        </main>

        {{-- Footer --}}
        <x-section slug="footer" :data="$footerData ?? []" tpl="full" />
    </div>
    @endvolt
</x-layouts.app>
