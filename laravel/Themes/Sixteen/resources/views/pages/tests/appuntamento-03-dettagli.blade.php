<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.appuntamento-03-dettagli');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = 'tests.appuntamento-03-dettagli';
    public array $data = [];
};
?>

<x-layouts.app>
    @volt('tests.appuntamento-03-dettagli')
    <div>
        <a class="skiplinks" href="#main">Vai al contenuto principale</a>
        
        <x-section slug="header" :data="$headerData ?? []" />
        
        <main class="container" id="main">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="/it/tests/appuntamento">Appuntamenti</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dettagli</li>
                </ol>
            </nav>
            
            <div class="row mt-8">
                <div class="col-12">
                    <x-blocks.steps.steps :data="[
                        'layout' => 'horizontal',
                        'steps' => [
                            ['number' => 1, 'title' => 'Ufficio', 'completed' => true],
                            ['number' => 2, 'title' => 'Data e Ora', 'completed' => true],
                            ['number' => 3, 'title' => 'Dettagli', 'active' => true],
                            ['number' => 4, 'title' => 'Richiedente', 'pending' => true],
                            ['number' => 5, 'title' => 'Riepilogo', 'pending' => true],
                            ['number' => 6, 'title' => 'Conferma', 'pending' => true],
                        ]
                    ]" />
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-lg-8">
                    <h2 class="title-xxlarge mb-4">Dettagli appuntamento</h2>
                    <p class="lead mb-6">Inserisci i dettagli per il tuo appuntamento</p>
                    
                    <form id="appointment-form" class="space-y-6">
                        <div>
                            <label for="motivo" class="block text-sm font-medium text-gray-700 mb-2">
                                Motivo dell'appuntamento <span class="text-red-500">*</span>
                            </label>
                            <textarea id="motivo" name="motivo" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Descrivi brevemente il motivo..." required></textarea>
                        </div>
                        
                        <div>
                            <label for="note" class="block text-sm font-medium text-gray-700 mb-2">
                                Note aggiuntive
                            </label>
                            <textarea id="note" name="note" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Eventuali note..."></textarea>
                        </div>
                        
                        <div>
                            <label for="documenti" class="block text-sm font-medium text-gray-700 mb-2">
                                Allega documenti
                            </label>
                            <input type="file" id="documenti" name="documenti" accept=".pdf,.jpg,.png" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent" />
                            <p class="text-sm text-gray-500 mt-1">Formati accettati: PDF, JPG, PNG (max 5MB)</p>
                        </div>
                    </form>
                </div>
                
                <div class="col-lg-4">
                    <aside class="sticky-top top-100">
                        <x-blocks.info-box :data="[
                            'title' => 'Documenti richiesti',
                            'content' => 'Porta con te un documento di identità valido e il codice fiscale.',
                            'icon' => 'heroicon-o-information-circle',
                        ]" />
                    </aside>
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-12">
                    <div class="flex justify-between gap-4">
                        <a href="/it/tests/appuntamento-02-data-orario" class="btn btn-secondary px-6 py-3">
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
