<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.appuntamento-05-riepilogo');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = 'tests.appuntamento-05-riepilogo';
    public array $data = [];
    
    public function getSummary(): array
    {
        return [
            'ufficio' => 'Servizi Demografici',
            'sede' => 'Piano 1, Ufficio 101-105',
            'data' => 'Mercoledì 17 aprile 2026',
            'ora' => '10:30',
            'nome' => 'Mario Rossi',
            'email' => 'mario.rossi@email.it',
            'telefono' => '+39 333 1234567',
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.appuntamento-05-riepilogo')
    <div>
        <a class="skiplinks" href="#main">Vai al contenuto principale</a>
        
        <x-section slug="header" :data="$headerData ?? []" />
        
        <main class="container" id="main">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="/it/tests/appuntamento">Appuntamenti</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Riepilogo</li>
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
                            ['number' => 4, 'title' => 'Richiedente', 'completed' => true],
                            ['number' => 5, 'title' => 'Riepilogo', 'active' => true],
                            ['number' => 6, 'title' => 'Conferma', 'pending' => true],
                        ]
                    ]" />
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-lg-8">
                    <h2 class="title-xxlarge mb-4">Riepilogo appuntamento</h2>
                    <p class="lead mb-6">Verifica i dati prima di confermare</p>
                    
                    <div class="space-y-6">
                        <div class="p-6 border border-gray-200 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
                                <x-filament::icon icon="heroicon-o-building-office" class="w-5 h-5 text-primary" />
                                Ufficio
                            </h3>
                            <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <dt class="text-sm text-gray-500">Ufficio</dt>
                                    <dd class="font-medium">{{ $this->getSummary()['ufficio'] }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm text-gray-500">Sede</dt>
                                    <dd class="font-medium">{{ $this->getSummary()['sede'] }}</dd>
                                </div>
                            </dl>
                        </div>
                        
                        <div class="p-6 border border-gray-200 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
                                <x-filament::icon icon="heroicon-o-calendar" class="w-5 h-5 text-primary" />
                                Data e Ora
                            </h3>
                            <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <dt class="text-sm text-gray-500">Data</dt>
                                    <dd class="font-medium">{{ $this->getSummary()['data'] }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm text-gray-500">Ora</dt>
                                    <dd class="font-medium">{{ $this->getSummary()['ora'] }}</dd>
                                </div>
                            </dl>
                        </div>
                        
                        <div class="p-6 border border-gray-200 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
                                <x-filament::icon icon="heroicon-o-user" class="w-5 h-5 text-primary" />
                                Richiedente
                            </h3>
                            <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <dt class="text-sm text-gray-500">Nome</dt>
                                    <dd class="font-medium">{{ $this->getSummary()['nome'] }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm text-gray-500">Email</dt>
                                    <dd class="font-medium">{{ $this->getSummary()['email'] }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm text-gray-500">Telefono</dt>
                                    <dd class="font-medium">{{ $this->getSummary()['telefono'] }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <aside class="sticky-top top-100">
                        <x-blocks.info-box :data="[
                            'title' => 'Modifica appuntamento',
                            'content' => 'Puoi modificare i dati cliccando su "Indietro" e tornando ai passaggi precedenti.',
                            'icon' => 'heroicon-o-pencil',
                        ]" />
                    </aside>
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-12">
                    <div class="flex justify-between gap-4">
                        <a href="/it/tests/appuntamento-04-richiedente" class="btn btn-secondary px-6 py-3">
                            <x-filament::icon icon="heroicon-m-arrow-left" class="w-5 h-5 mr-2" />
                            Indietro
                        </a>
                        <button type="submit" form="appointment-form" class="btn btn-primary px-6 py-3">
                            Conferma appuntamento
                            <x-filament::icon icon="heroicon-m-check" class="w-5 h-5 ml-2" />
                        </button>
                    </div>
                </div>
            </div>
        </main>
        
        <x-section slug="footer" :data="$footerData ?? []" tpl="full" />
    </div>
    @endvolt
</x-layouts.app>
