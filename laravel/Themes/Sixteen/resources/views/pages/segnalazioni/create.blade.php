<?php

use function Laravel\Folio\name;

name('segnalazioni.create');
?>

@volt
new class extends \Livewire\Volt\Component {
    public $title = '';
    public $description = '';
    public $category = '';
    public $address = '';
    public $latitude = '';
    public $longitude = '';
    public $priority = 'medium';
    public $attachments = [];

    public $categories = [
        'acqua' => 'Acqua, allagamenti, problemi fognari',
        'ambiente' => 'Ambiente, inquinamento, protezione ambientale',
        'arredo' => 'Arredo urbano',
        'disinfestazione' => 'Disinfestazione, derattizzazione, animali randagi',
        'igiene' => 'Igiene urbana, rifiuti, pulizia e decoro',
        'manutenzione' => 'Manutenzione immobili, edifici pubblici, scuole, barriere architettoniche, cimiteri',
        'ordine' => 'Ordine pubblico, disturbo della quiete',
        'parchi' => 'Parchi e verde pubblico',
        'servizi' => 'Servizi del comune',
        'sicurezza' => 'Sicurezza, degrado urbano e sociale',
        'strade' => 'Strade, marciapiedi, segnaletica e viabilità',
    ];

    public $priorities = [
        'low' => 'Bassa',
        'medium' => 'Media',
        'high' => 'Alta',
        'urgent' => 'Urgente',
    ];

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|min:10',
        'category' => 'required|string',
        'address' => 'required|string',
        'priority' => 'required|string',
    ];

    public function save()
    {
        $this->validate();
        session()->flash('message', 'Segnalazione creata con successo!');
        return redirect()->to('/segnalazioni');
    }

    public function getLocation()
    {
        $this->address = 'Via Roma, 1, Firenze, Italia';
        $this->latitude = '43.7696';
        $this->longitude = '11.2558';
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
                        <a href="/segnalazioni" class="hover:text-blue-600">Elenco segnalazioni</a>
                    </li>
                    <li class="flex items-center">
                        <x-filament::icon icon="heroicon-o-chevron-right" class="w-4 h-4 mx-2" />
                        <span class="text-gray-900 font-medium">Nuova segnalazione</span>
                    </li>
                </ol>
            </nav>

            <div class="mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Nuova Segnalazione</h1>
                <p class="text-lg text-gray-600">Compila il modulo per creare una nuova segnalazione</p>
            </div>

            <div class="max-w-4xl mx-auto">
                <form wire:submit="save" class="bg-white rounded-lg shadow-sm border p-8">
                    @if (session()->has('message'))
                        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">{{ session('message') }}</div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titolo della segnalazione *</label>
                            <input type="text" id="title" wire:model="title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Es. Buca sulla strada principale">
                            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Categoria *</label>
                            <select id="category" wire:model="category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Seleziona una categoria</option>
                                @foreach($categories as $key => $name)
                                    <option value="{{ $key }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="priority" class="block text-sm font-medium text-gray-700 mb-2">Priorità *</label>
                            <select id="priority" wire:model="priority" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                @foreach($priorities as $key => $name)
                                    <option value="{{ $key }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('priority') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Indirizzo *</label>
                            <div class="flex space-x-2">
                                <input type="text" id="address" wire:model="address" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Es. Via Roma, 1, Firenze">
                                <button type="button" wire:click="getLocation" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <x-filament::icon icon="heroicon-o-map-pin" class="w-4 h-4 inline mr-1" /> Posizione
                                </button>
                            </div>
                            @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Descrizione dettagliata *</label>
                            <textarea id="description" wire:model="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Descrivi il problema in dettaglio..."></textarea>
                            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Allegati (opzionale)</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                                <x-filament::icon icon="heroicon-o-arrow-up-tray" class="w-12 h-12 text-gray-400 mx-auto mb-4" />
                                <p class="text-gray-500">Trascina qui le foto o clicca per selezionare</p>
                                <p class="text-sm text-gray-400 mt-1">PNG, JPG, PDF fino a 10MB</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                        <a href="/segnalazioni" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50">Annulla</a>
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Crea Segnalazione</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <x-section slug="footer" />
</x-layouts.app>
@endvolt