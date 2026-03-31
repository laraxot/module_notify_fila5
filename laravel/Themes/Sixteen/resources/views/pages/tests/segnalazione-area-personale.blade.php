<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.segnalazione-area-personale');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = 'tests.segnalazione-area-personale';
    public array $data = [];
    
    public function getStats(): array
    {
        return [
            ['label' => 'Totale', 'value' => '12', 'icon' => 'heroicon-o-document-text'],
            ['label' => 'In lavorazione', 'value' => '3', 'icon' => 'heroicon-o-clock'],
            ['label' => 'Completate', 'value' => '8', 'icon' => 'heroicon-o-check-circle'],
            ['label' => 'Da pagare', 'value' => '1', 'icon' => 'heroicon-o-banknotes'],
        ];
    }
    
    public function getReports(): array
    {
        return [
            ['protocollo' => 'SEG-2026-001234', 'categoria' => 'Rifiuti', 'data' => '30/03/2026', 'stato' => 'In lavorazione', 'indirizzo' => 'Via Roma 1'],
            ['protocollo' => 'SEG-2026-001123', 'categoria' => 'Strade', 'data' => '28/03/2026', 'stato' => 'Completata', 'indirizzo' => 'Piazza Duomo'],
            ['protocollo' => 'SEG-2026-001012', 'categoria' => 'Illuminazione', 'data' => '25/03/2026', 'stato' => 'Completata', 'indirizzo' => 'Via Garibaldi 15'],
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.segnalazione-area-personale')
    <div>
        <a class="skiplinks" href="#main">Vai al contenuto principale</a>
        
        <x-section slug="header" :data="$headerData ?? []" />
        
        <main class="container" id="main">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Area personale</li>
                </ol>
            </nav>
            
            <div class="row">
                <div class="col">
                    <h1 class="title-xxxlarge mb-4">Area personale</h1>
                    <p class="lead">Le tue segnalazioni</p>
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-12">
                    <h2 class="title-xxlarge mb-6">Riepilogo</h2>
                </div>
            </div>
            
            <div class="row g-4">
                @foreach($this->getStats() as $stat)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="p-6 border border-gray-200 rounded-lg">
                        <div class="flex items-center gap-4">
                            <x-filament::icon :icon="$stat['icon']" class="w-10 h-10 text-primary" />
                            <div>
                                <div class="text-2xl font-bold">{{ $stat['value'] }}</div>
                                <div class="text-sm text-gray-600">{{ $stat['label'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="row mt-8">
                <div class="col-12">
                    <h2 class="title-xxlarge mb-6">Ultime segnalazioni</h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="space-y-4">
                        @foreach($this->getReports() as $report)
                        <div class="p-4 border border-gray-200 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="font-semibold">{{ $report['protocollo'] }}</span>
                                        <span class="px-2 py-1 text-xs rounded-full {{ $report['stato'] === 'Completata' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $report['stato'] }}
                                        </span>
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        {{ $report['categoria'] }} - {{ $report['indirizzo'] }} - {{ $report['data'] }}
                                    </div>
                                </div>
                                <a href="#" class="btn btn-secondary btn-sm">Vedi</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
        
        <x-section slug="footer" :data="$footerData ?? []" tpl="full" />
    </div>
    @endvolt
</x-layouts.app>
