<?php

declare(strict_types=1);

use function Laravel\Folio\name;
use Livewire\Volt\Component;

name('tests.argomenti');

new class extends Component {
    public function mount(): void {}
};
?>

<x-layouts.bootstrap-italia>
    @volt('tests.argomenti')
    
    {{-- Skip Links (Accessibilità) --}}
    <x-accessibility.skiplinks />
    
    {{-- Header Bootstrap Italia --}}
    <x-bootstrap-italia.header 
        :regionName="'Regione Lazio'"
        :logoUrl="'/themes/sixteen/images/stemma-comune.svg'"
        :title="'Comune di FixCity'"
        :tagline="'Città Metropolitana'"
        :navItems="[
            ['label' => 'Amministrazione', 'url' => '/it/tests/amministrazione'],
            ['label' => 'Novità', 'url' => '/it/tests/novita'],
            ['label' => 'Servizi', 'url' => '/it/tests/servizi'],
            ['label' => 'Vivere il Comune', 'url' => '/it/tests/vivere'],
        ]"
        :secondaryNavItems="[
            ['label' => 'Tutti gli argomenti', 'url' => '/it/tests/argomenti'],
            ['label' => 'In evidenza', 'url' => '/it/tests/evidenza'],
        ]"
    />
    
    {{-- Breadcrumb --}}
    <x-agid.breadcrumb 
        :items="[
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Lista Argomenti', 'url' => null],
        ]" 
    />
    
    {{-- Main Content --}}
    <main id="main-content" class="container py-5">
        
        {{-- Page Title --}}
        <div class="cmp-heading mb-5">
            <h1 class="title-xxxlarge mb-2">ARGOMENTI</h1>
            <p class="subtitle-small">Esplora i temi del sito</p>
        </div>
        
        {{-- Featured Topics (IN EVIDENZA) --}}
        <section class="mb-5" aria-labelledby="featured-heading">
            <h2 id="featured-heading" class="h4 mb-3">IN EVIDENZA</h2>
            <div class="row g-4">
                {{-- Card 1 --}}
                <div class="col-12 col-md-4">
                    <div class="card card-topic shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="card-title h5">
                                <a href="/cultura" class="stretched-link">Cultura</a>
                            </h3>
                            <p class="card-text">Eventi e notizie culturali</p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <span class="badge bg-primary">In evidenza</span>
                        </div>
                    </div>
                </div>
                
                {{-- Card 2 --}}
                <div class="col-12 col-md-4">
                    <div class="card card-topic shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="card-title h5">
                                <a href="/sport" class="stretched-link">Sport</a>
                            </h3>
                            <p class="card-text">Attività sportive e impianti</p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <span class="badge bg-primary">In evidenza</span>
                        </div>
                    </div>
                </div>
                
                {{-- Card 3 --}}
                <div class="col-12 col-md-4">
                    <div class="card card-topic shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="card-title h5">
                                <a href="/famiglia" class="stretched-link">Famiglia</a>
                            </h3>
                            <p class="card-text">Servizi per la famiglia</p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <span class="badge bg-primary">In evidenza</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        {{-- All Topics (ESPLORA PER ARGOMENTO) --}}
        <section aria-labelledby="all-topics-heading">
            <h2 id="all-topics-heading" class="h4 mb-3">ESPLORA PER ARGOMENTO</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                {{-- Card Topic Component --}}
                <x-blocks.topics.grid 
                    :title="'Esplora per argomento'"
                    :items="[
                        ['title' => 'Agricoltura', 'href' => '/agricoltura'],
                        ['title' => 'Animali', 'href' => '/animali'],
                        ['title' => 'Casa', 'href' => '/casa'],
                        ['title' => 'Cultura', 'href' => '/cultura'],
                        ['title' => 'Famiglia', 'href' => '/famiglia'],
                        ['title' => 'Lavoro', 'href' => '/lavoro'],
                        ['title' => 'Scuola', 'href' => '/scuola'],
                        ['title' => 'Sport', 'href' => '/sport'],
                        ['title' => 'Turismo', 'href' => '/turismo'],
                        ['title' => 'Urbanistica', 'href' => '/urbanistica'],
                        ['title' => 'Trasporti', 'href' => '/trasporti'],
                        ['title' => 'Salute', 'href' => '/salute'],
                    ]"
                />
            </div>
        </section>
        
        {{-- Feedback Section --}}
        <section class="mt-5" aria-labelledby="feedback-heading">
            <h2 id="feedback-heading" class="h5">Valuta la pagina</h2>
            <x-blocks.feedback.rating />
        </section>
    </main>
    
    {{-- Footer --}}
    <x-footer-comune />
    
    @endvolt
</x-layouts.bootstrap-italia>
