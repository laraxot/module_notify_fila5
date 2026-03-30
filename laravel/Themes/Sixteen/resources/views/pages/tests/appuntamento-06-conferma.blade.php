<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.appuntamento-06-conferma');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = 'tests.appuntamento-06-conferma';
    public array $data = [];
};
?>

<x-layouts.app>
    @volt('tests.appuntamento-06-conferma')
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
                    <li class="breadcrumb-item">
                        <a class="text-decoration-none" href="/it/tests/appuntamento-01-ufficio">Appuntamenti</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Conferma</li>
                </ol>
            </nav>
            
            {{-- Success Hero --}}
            <x-blocks.hero.hero :data="[
                'title' => 'Appuntamento Confermato',
                'subtitle' => 'La tua prenotazione è stata registrata',
                'description' => 'Il tuo appuntamento è stato prenotato con successo. Riceverai una email di conferma.',
                'background' => 'white',
                'alignment' => 'center'
            ]" />
            
            {{-- Appointment Details --}}
            <div class="row mt-8">
                <div class="col-lg-8">
                    <x-blocks.details.details :data="[
                        'title' => 'Riepilogo Appuntamento',
                        'layout' => 'grouped',
                        'items' => [
                            [
                                'title' => 'Dettagli',
                                'items' => [
                                    ['label' => 'Servizio', 'value' => 'Richiesta carta d'identità elettronica', 'icon' => 'heroicon-o-identification'],
                                    ['label' => 'Data', 'value' => 'Mercoledì 17 aprile 2026', 'icon' => 'heroicon-o-calendar'],
                                    ['label' => 'Ora', 'value' => '10:30', 'icon' => 'heroicon-o-clock'],
                                    ['label' => 'Codice prenotazione', 'value' => 'FC-AP-2026-0417', 'icon' => 'heroicon-o-ticket'],
                                ]
                            ],
                            [
                                'title' => 'Sede',
                                'items' => [
                                    ['label' => 'Ufficio', 'value' => 'Municipio, sportello servizi demografici', 'icon' => 'heroicon-o-building-office'],
                                    ['label' => 'Indirizzo', 'value' => 'Via Roma 1, Comune', 'icon' => 'heroicon-o-map-pin'],
                                ]
                            ],
                        ]
                    ]" />
                </div>
                
                {{-- Next Steps --}}
                <div class="col-lg-4">
                    <x-blocks.steps.steps :data="[
                        'title' => 'Prossimi Passi',
                        'layout' => 'vertical',
                        'steps' => [
                            ['number' => 1, 'title' => 'Presentati in comune', 'description' => 'Arriva 10 minuti prima con i documenti richiesti', 'icon' => 'heroicon-o-user'],
                            ['number' => 2, 'title' => 'Consegna documenti', 'description' => 'Consegna la documentazione necessaria all'operatore', 'icon' => 'heroicon-o-document-text'],
                            ['number' => 3, 'title' => 'Ritira ricevuta', 'description' => 'Ritira la ricevuta di richiesta della carta d'identità', 'icon' => 'heroicon-o-check-badge'],
                            ['number' => 4, 'title' => 'Attendi ritiro', 'description' => 'Riceverai un SMS quando la carta sarà pronta per il ritiro', 'icon' => 'heroicon-o-envelope'],
                        ]
                    ]" />
                </div>
            </div>
            
            {{-- Documents Required --}}
            <div class="row mt-8">
                <div class="col-12">
                    <x-blocks.list.list :data="[
                        'title' => 'Documenti Richiesti',
                        'style' => 'icon',
                        'items' => [
                            ['text' => 'Documento di identità valido', 'icon' => 'heroicon-o-identification'],
                            ['text' => 'Codice fiscale', 'icon' => 'heroicon-o-document-text'],
                            ['text' => '2 foto tessera recenti', 'icon' => 'heroicon-o-camera'],
                            ['text' => 'Permesso di soggiorno (per cittadini extracomunitari)', 'icon' => 'heroicon-o-document-check'],
                        ]
                    ]" />
                </div>
            </div>
            
            {{-- CTA --}}
            <div class="row mt-8 mb-8">
                <div class="col text-center">
                    <x-blocks.cta.cta :data="[
                        'title' => 'Hai bisogno di aiuto?',
                        'description' => 'Contatta l'ufficio servizi demografici',
                        'button_text' => 'Contattaci',
                        'button_url' => '/it/tests/assistenza',
                        'secondary_text' => 'Consulta le domande frequenti',
                        'secondary_url' => '/it/tests/domande-frequenti'
                    ]" />
                </div>
            </div>
        </main>
        
        {{-- Footer --}}
        <x-section slug="footer" :data="$footerData ?? []" tpl="full" />
    </div>
    @endvolt
</x-layouts.app>
