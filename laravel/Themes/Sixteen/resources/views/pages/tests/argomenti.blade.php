<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.argomenti');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = 'tests.argomenti';
    public array $data = [];
    
    public function getTopics(): array
    {
        return [
            ['title' => 'Agricoltura', 'description' => 'Contributi, territorio rurale e attività agricole.', 'url' => '#', 'icon' => 'heroicon-o-circle-stack'],
            ['title' => 'Animale domestico', 'description' => 'Anagrafe animali, tutela e servizi dedicati.', 'url' => '#', 'icon' => 'heroicon-o-paw-print'],
            ['title' => 'Assistenza sociale', 'description' => 'Sostegni, aiuti e servizi alla persona.', 'url' => '#', 'icon' => 'heroicon-o-heart'],
            ['title' => 'Associazioni', 'description' => 'Vita associativa, patrocini e spazi civici.', 'url' => '#', 'icon' => 'heroicon-o-users'],
            ['title' => 'Concorsi', 'description' => 'Bandi, selezioni pubbliche e graduatorie.', 'url' => '#', 'icon' => 'heroicon-o-document-text'],
            ['title' => 'Formazione professionale', 'description' => 'Percorsi, opportunità e orientamento.', 'url' => '#', 'icon' => 'heroicon-o-academic-cap'],
            ['title' => 'Imposte', 'description' => 'Tributi, canoni e fiscalità locale.', 'url' => '#', 'icon' => 'heroicon-o-banknotes'],
            ['title' => 'Imprese', 'description' => 'Sportelli, autorizzazioni e supporto attività economiche.', 'url' => '#', 'icon' => 'heroicon-o-briefcase'],
            ['title' => 'Inquinamento', 'description' => 'Qualità ambientale, monitoraggi e segnalazioni.', 'url' => '#', 'icon' => 'heroicon-o-exclamation-triangle'],
            ['title' => 'Integrazione sociale', 'description' => 'Iniziative per inclusione e cittadinanza attiva.', 'url' => '#', 'icon' => 'heroicon-o-hand-raised'],
            ['title' => 'Istruzione', 'description' => 'Scuola, mensa, trasporto e servizi educativi.', 'url' => '#', 'icon' => 'heroicon-o-book-open'],
            ['title' => 'Lavoro', 'description' => 'Orientamento, bandi e opportunità occupazionali.', 'url' => '#', 'icon' => 'heroicon-o-wrench-screwdriver'],
            ['title' => 'Parcheggi', 'description' => 'Sosta, permessi e regolazione urbana.', 'url' => '#', 'icon' => 'heroicon-o-truck'],
            ['title' => 'Patrimonio culturale', 'description' => 'Luoghi, archivi e valorizzazione culturale.', 'url' => '#', 'icon' => 'heroicon-o-museum-shop'],
            ['title' => 'Piano di sviluppo', 'description' => 'Programmazione, piani e trasformazioni urbane.', 'url' => '#', 'icon' => 'heroicon-o-chart-bar'],
            ['title' => 'Pista ciclabile', 'description' => 'Percorsi, mobilità dolce e sicurezza.', 'url' => '#', 'icon' => 'heroicon-o-bicycle'],
            ['title' => 'Trasporto pubblico', 'description' => 'Linee, orari e servizi di mobilità.', 'url' => '#', 'icon' => 'heroicon-o-bus'],
            ['title' => 'Zone pedonali', 'description' => 'Aree pedonali, accessi e regolamenti.', 'url' => '#', 'icon' => 'heroicon-o-walking'],
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.argomenti')
    <div>
        {{-- Skip Links --}}
        <a class="skiplinks" href="#main">Vai al contenuto principale</a>
        
        {{-- Header --}}
        <x-section slug="header" :data="$headerData ?? []" />
        
        {{-- Main Content --}}
        <main class="container" id="main">
            {{-- Breadcrumbs --}}
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a class="text-decoration-none" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Argomenti</li>
                </ol>
            </nav>
            
            {{-- Page Title --}}
            <div class="row">
                <div class="col">
                    <h1 class="title-xxxlarge mb-4">Argomenti</h1>
                    <p class="lead">
                        Gli argomenti rispondono a un'esigenza di organizzazione dei contenuti del sito istituzionale per tematiche.
                    </p>
                </div>
            </div>
            
            {{-- Topics Grid --}}
            <div class="row mt-8">
                <div class="col-lg-8">
                    <h2 class="title-xxlarge mb-6">Esplora per argomento</h2>
                    <div class="row g-4">
                        @foreach($this->getTopics() as $topic)
                        <div class="col-12 col-md-6">
                            <x-blocks.card.card :data="$topic" />
                        </div>
                        @endforeach
                    </div>
                </div>
                
                {{-- Sidebar --}}
                <div class="col-lg-4">
                    <aside class="sticky-top top-100">
                        {{-- Search Box --}}
                        <x-blocks.form.search :data="['placeholder' => 'Cerca argomento...']" />
                        
                        {{-- Quick Links --}}
                        <x-blocks.list.list :data="[
                            'title' => 'Link utili',
                            'style' => 'icon',
                            'items' => [
                                ['text' => 'Amministrazione', 'url' => '/it/amministrazione', 'icon' => 'heroicon-o-building-office'],
                                ['text' => 'Servizi', 'url' => '/it/servizi', 'icon' => 'heroicon-o-wrench-screwdriver'],
                                ['text' => 'Novità', 'url' => '/it/novita', 'icon' => 'heroicon-o-newspaper'],
                                ['text' => 'Eventi', 'url' => '/it/eventi', 'icon' => 'heroicon-o-calendar-days'],
                            ]
                        ]" />
                    </aside>
                </div>
            </div>
        </main>
        
        {{-- Footer --}}
        <x-section slug="footer" :data="$footerData ?? []" tpl="full" />
    </div>
    @endvolt
</x-layouts.app>
