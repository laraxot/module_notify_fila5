<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.segnalazioni-elenco');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = 'tests.segnalazioni-elenco';
    public array $data = [];
    
    public function getCategories(): array
    {
        return [
            ['label' => 'Tutte', 'value' => '', 'icon' => 'heroicon-o-list'],
            ['label' => 'In lavorazione', 'value' => 'lavorazione', 'icon' => 'heroicon-o-clock'],
            ['label' => 'Completate', 'value' => 'completate', 'icon' => 'heroicon-o-check-circle'],
            ['label' => 'Da pagare', 'value' => 'pagare', 'icon' => 'heroicon-o-banknotes'],
        ];
    }
    
    public function getReports(): array
    {
        return [
            ['protocollo' => 'SEG-2026-001234', 'categoria' => 'Rifiuti', 'data' => '30/03/2026', 'indirizzo' => 'Via Roma 1', 'stato' => 'In lavorazione'],
            ['protocollo' => 'SEG-2026-001123', 'categoria' => 'Strade', 'data' => '28/03/2026', 'indirizzo' => 'Piazza Duomo', 'stato' => 'Completata'],
            ['protocollo' => 'SEG-2026-001012', 'categoria' => 'Illuminazione', 'data' => '25/03/2026', 'indirizzo' => 'Via Garibaldi 15', 'stato' => 'Completata'],
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.segnalazioni-elenco')
    <div>
        <a class="skiplinks" href="#main">Vai al contenuto principale</a>
        
        <x-section slug="header" :data="$headerData ?? []" />
        
        <main class="container" id="main">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Elenco segnalazioni</li>
                </ol>
            </nav>
            
            <div class="row">
                <div class="col">
                    <h1 class="title-xxxlarge mb-4">Elenco segnalazioni</h1>
                    <p class="lead">Tutte le segnalazioni inviate</p>
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-12">
                    <x-blocks.filter.categories :data="['title' => 'Filtra per stato', 'items' => $this->getCategories()]" />
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-12">
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Protocollo</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Categoria</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Data</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Indirizzo</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Stato</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($this->getReports() as $report)
                                <tr class="border-t">
                                    <td class="px-4 py-3 font-medium">{{ $report['protocollo'] }}</td>
                                    <td class="px-4 py-3">{{ $report['categoria'] }}</td>
                                    <td class="px-4 py-3">{{ $report['data'] }}</td>
                                    <td class="px-4 py-3">{{ $report['indirizzo'] }}</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 text-xs rounded-full {{ $report['stato'] === 'Completata' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $report['stato'] }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <a href="#" class="text-primary hover:underline">Vedi</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-12">
                    <x-blocks.navigation.pagination :data="['items' => $this->getReports()]" />
                </div>
            </div>
        </main>
        
        <x-section slug="footer" :data="$footerData ?? []" tpl="full" />
    </div>
    @endvolt
</x-layouts.app>
