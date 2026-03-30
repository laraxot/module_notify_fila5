<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.appuntamento-04-richiedente');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = 'tests.appuntamento-04-richiedente';
    public array $data = [];
};
?>

<x-layouts.app>
    @volt('tests.appuntamento-04-richiedente')
    <div>
        <a class="skiplinks" href="#main">Vai al contenuto principale</a>
        
        <x-section slug="header" :data="$headerData ?? []" />
        
        <main class="container" id="main">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="/it/tests/appuntamento">Appuntamenti</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Richiedente</li>
                </ol>
            </nav>
            
            <div class="row mt-8">
                <div class="col-12">
                    <x-blocks.steps.steps :data="[
                        'layout' => 'horizontal',
                        'steps' => [
                            ['number' => 1, 'title' => 'Ufficio', 'completed' => true],
                            ['number' => 2, 'title' => 'Data e Ora', 'completed' => true],
                            ['number' => 3, 'title' => 'Dettagli', 'completed' => true],
                            ['number' => 4, 'title' => 'Richiedente', 'active' => true],
                            ['number' => 5, 'title' => 'Riepilogo', 'pending' => true],
                            ['number' => 6, 'title' => 'Conferma', 'pending' => true],
                        ]
                    ]" />
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-lg-8">
                    <h2 class="title-xxlarge mb-4">I tuoi dati</h2>
                    <p class="lead mb-6">Inserisci i tuoi dati per completare la prenotazione</p>
                    
                    <form id="appointment-form" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="nome" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nome <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nome" name="nome" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent" required />
                            </div>
                            
                            <div>
                                <label for="cognome" class="block text-sm font-medium text-gray-700 mb-2">
                                    Cognome <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="cognome" name="cognome" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent" required />
                            </div>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent" required />
                        </div>
                        
                        <div>
                            <label for="telefono" class="block text-sm font-medium text-gray-700 mb-2">
                                Telefono
                            </label>
                            <input type="tel" id="telefono" name="telefono" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent" />
                        </div>
                        
                        <div>
                            <label for="codice_fiscale" class="block text-sm font-medium text-gray-700 mb-2">
                                Codice Fiscale <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="codice_fiscale" name="codice_fiscale" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent" required />
                        </div>
                        
                        <div>
                            <label class="flex items-start gap-2">
                                <input type="checkbox" name="privacy" class="mt-1" required />
                                <span class="text-sm text-gray-700">
                                    Accetto la <a href="/it/privacy" class="text-primary hover:underline" target="_blank">privacy policy</a> e il trattamento dei dati personali <span class="text-red-500">*</span>
                                </span>
                            </label>
                        </div>
                    </form>
                </div>
                
                <div class="col-lg-4">
                    <aside class="sticky-top top-100">
                        <x-blocks.info-box :data="[
                            'title' => 'Protezione dati',
                            'content' => 'I tuoi dati sono al sicuro. Verranno utilizzati solo per l'appuntamento.',
                            'icon' => 'heroicon-o-shield-check',
                        ]" />
                    </aside>
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-12">
                    <div class="flex justify-between gap-4">
                        <a href="/it/tests/appuntamento-03-dettagli" class="btn btn-secondary px-6 py-3">
                            <x-filament::icon icon="heroicon-m-arrow-left" class="w-5 h-5 mr-2" />
                            Indietro
                        </a>
                        <button type="submit" form="appointment-form" class="btn btn-primary px-6 py-3">
                            Avanti
                            <x-filament::icon icon="heroicon-m-arrow-right" class="w-5 h-5 ml-2" />
                        </button>
                    </div>
                </div>
            </div>
        </main>
        
        <x-section slug="footer" :data="$footerData ?? []" tpl="full" />
    </div>
    @endvolt
</x-layouts.app>
