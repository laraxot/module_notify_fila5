<?php

use function Laravel\Folio\name;

name('segnalazioni');
?>

<x-layouts.app>
@volt('segnalazioni')
<div class="segnalazioni-page">
new class extends \Livewire\Volt\Component {
    public $search = '';
    public $selectedCategories = [];
    public $viewMode = 'map';
    public $tickets = [];
    public $categories = [
        'acqua' => ['name' => 'Acqua, allagamenti, problemi fognari', 'count' => 21],
        'ambiente' => ['name' => 'Ambiente, inquinamento, protezione ambientale', 'count' => 14],
        'arredo' => ['name' => 'Arredo urbano', 'count' => 7],
        'disinfestazione' => ['name' => 'Disinfestazione, derattizzazione, animali randagi', 'count' => 208],
        'igiene' => ['name' => 'Igiene urbana, rifiuti, pulizia e decoro', 'count' => 321],
        'manutenzione' => ['name' => 'Manutenzione immobili, edifici pubblici, scuole, barriere architettoniche, cimiteri', 'count' => 302],
        'ordine' => ['name' => 'Ordine pubblico, disturbo della quiete', 'count' => 302],
        'parchi' => ['name' => 'Parchi e verde pubblico', 'count' => 302],
        'servizi' => ['name' => 'Servizi del comune', 'count' => 302],
        'sicurezza' => ['name' => 'Sicurezza, degrado urbano e sociale', 'count' => 302],
        'strade' => ['name' => 'Strade, marciapiedi, segnaletica e viabilità', 'count' => 302],
    ];

    public function mount(): void
    {
        $this->tickets = [
            ['id' => 1, 'title' => 'Buca sulla strada principale', 'category' => 'strade', 'status' => 'open', 'lat' => 43.7696, 'lng' => 11.2558],
            ['id' => 2, 'title' => 'Lampione non funzionante', 'category' => 'arredo', 'status' => 'in_progress', 'lat' => 43.7719, 'lng' => 11.2481],
            ['id' => 3, 'title' => 'Rifiuti abbandonati', 'category' => 'igiene', 'status' => 'resolved', 'lat' => 43.7750, 'lng' => 11.2500],
        ];
    }

    public function toggleCategory(string $category): void
    {
        if (in_array($category, $this->selectedCategories)) {
            $this->selectedCategories = array_diff($this->selectedCategories, [$category]);
        } else {
            $this->selectedCategories[] = $category;
        }
    }

    public function setViewMode(string $mode): void
    {
        $this->viewMode = $mode;
    }

    public function clearFilters(): void
    {
        $this->selectedCategories = [];
        $this->search = '';
    }

    public function getFilteredTickets(): array
    {
        $filtered = $this->tickets;

        if (!empty($this->selectedCategories)) {
            $filtered = array_filter($filtered, fn($ticket) => in_array($ticket['category'], $this->selectedCategories));
        }

        if (!empty($this->search)) {
            $filtered = array_filter($filtered, fn($ticket) => stripos($ticket['title'], $this->search) !== false);
        }

        return $filtered;
    }

    public function getTotalResults(): int
    {
        return count($this->getFilteredTickets());
    }
}
<x-layouts.app>
    <x-section slug="header" />
    <div class="min-h-screen bg-gray-50">
        <main class="container mx-auto px-4 py-8">
            <nav class="mb-6">
                <ol class="flex items-center space-x-2 text-sm text-gray-600">
                    <li><a href="/" class="hover:text-blue-600">Home</a></li>
                    <li class="flex items-center">
                        <x-filament::icon icon="heroicon-o-chevron-right" class="w-4 h-4 mx-2" />
                        <span class="text-gray-900 font-medium">Elenco segnalazioni</span>
                    </li>
                </ol>
            </nav>

            <div class="mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Elenco segnalazioni</h1>
                <p class="text-lg text-gray-600">Negli ultimi 12 mesi sono state risolte <span class="font-semibold text-green-600">73</span> segnalazioni.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-sm border p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">CATEGORIA</h3>
                        <div class="space-y-3">
                            @foreach($categories as $key => $category)
                            <label class="flex items-center space-x-3 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                <input type="checkbox" wire:model.live="selectedCategories" value="{{ $key }}" class="w-4 h-4 text-blue-600 rounded border-gray-300">
                                <span class="text-sm text-gray-700">
                                    {{ $category['name'] }}
                                    <span class="text-blue-600 font-medium">({{ $category['count'] }})</span>
                                </span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <div class="bg-white rounded-lg shadow-sm border">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-4">
                                    <h2 class="text-xl font-semibold text-gray-900">{{ $this->getTotalResults() }} Risultati</h2>
                                    <div class="flex space-x-1">
                                        <button wire:click="setViewMode('map')" class="px-4 py-2 {{ $viewMode === 'map' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700' }} rounded-l-md font-medium">Mappa</button>
                                        <button wire:click="setViewMode('list')" class="px-4 py-2 {{ $viewMode === 'list' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700' }} rounded-r-md font-medium">Elenco</button>
                                    </div>
                                </div>
                                <button wire:click="clearFilters" class="text-sm text-blue-600 hover:text-blue-800">Rimuovi tutti i filtri</button>
                            </div>
                        </div>

                        @if($viewMode === 'map')
                        <div class="h-96 bg-gray-100 flex items-center justify-center">
                            <div class="text-center">
                                <x-filament::icon icon="heroicon-o-map-pin" class="w-16 h-16 text-gray-400 mx-auto mb-4" />
                                <p class="text-gray-500">Mappa interattiva delle segnalazioni</p>
                                <p class="text-sm text-gray-400 mt-2">Firenze, Italia</p>
                                <div class="mt-4 text-xs text-gray-400">
                                    @foreach($this->getFilteredTickets() as $ticket)
                                        <div class="inline-block mr-2 mb-1 px-2 py-1 bg-blue-100 text-blue-800 rounded">{{ $ticket['title'] }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="p-6">
                            <div class="space-y-4">
                                @forelse($this->getFilteredTickets() as $ticket)
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-semibold text-gray-900">{{ $ticket['title'] }}</h3>
                                            <p class="text-sm text-gray-600 mt-1">Categoria: {{ $categories[$ticket['category']]['name'] }}</p>
                                            <p class="text-sm text-gray-500 mt-1">Coordinate: {{ $ticket['lat'] }}, {{ $ticket['lng'] }}</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs rounded-full
                                            @if($ticket['status'] === 'open') bg-red-100 text-red-800
                                            @elseif($ticket['status'] === 'in_progress') bg-yellow-100 text-yellow-800
                                            @else bg-green-100 text-green-800
                                            @endif">
                                            @if($ticket['status'] === 'open') Aperta
                                            @elseif($ticket['status'] === 'in_progress') In corso
                                            @else Risolta
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                @empty
                                <div class="text-center py-8"><p class="text-gray-500">Nessuna segnalazione trovata</p></div>
                                @endforelse
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>
    <x-section slug="footer" />
@endvolt
</x-layouts.app>