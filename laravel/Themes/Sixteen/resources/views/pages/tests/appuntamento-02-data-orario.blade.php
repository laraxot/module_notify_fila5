<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.appuntamento-02-data-orario');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = 'tests.appuntamento-02-data-orario';
    public array $data = [];
    
    public function getAvailableDates(): array
    {
        return [
            ['date' => '2026-04-01', 'day' => 'Mer', 'available' => true],
            ['date' => '2026-04-02', 'day' => 'Gio', 'available' => true],
            ['date' => '2026-04-03', 'day' => 'Ven', 'available' => true],
            ['date' => '2026-04-04', 'day' => 'Sab', 'available' => false],
            ['date' => '2026-04-07', 'day' => 'Lun', 'available' => true],
            ['date' => '2026-04-08', 'day' => 'Mar', 'available' => true],
        ];
    }
    
    public function getTimeSlots(): array
    {
        return [
            ['time' => '09:00', 'available' => true],
            ['time' => '09:30', 'available' => true],
            ['time' => '10:00', 'available' => false],
            ['time' => '10:30', 'available' => true],
            ['time' => '11:00', 'available' => true],
            ['time' => '11:30', 'available' => false],
            ['time' => '14:00', 'available' => true],
            ['time' => '14:30', 'available' => true],
            ['time' => '15:00', 'available' => true],
            ['time' => '15:30', 'available' => false],
            ['time' => '16:00', 'available' => true],
            ['time' => '16:30', 'available' => true],
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.appuntamento-02-data-orario')
    <div>
        <a class="skiplinks" href="#main">Vai al contenuto principale</a>
        
        <x-section slug="header" :data="$headerData ?? []" />
        
        <main class="container" id="main">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="/it/tests/appuntamento">Appuntamenti</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data e Ora</li>
                </ol>
            </nav>
            
            <div class="row mt-8">
                <div class="col-12">
                    <x-blocks.steps.steps :data="[
                        'layout' => 'horizontal',
                        'steps' => [
                            ['number' => 1, 'title' => 'Ufficio', 'completed' => true],
                            ['number' => 2, 'title' => 'Data e Ora', 'active' => true],
                            ['number' => 3, 'title' => 'Dettagli', 'pending' => true],
                            ['number' => 4, 'title' => 'Richiedente', 'pending' => true],
                            ['number' => 5, 'title' => 'Riepilogo', 'pending' => true],
                            ['number' => 6, 'title' => 'Conferma', 'pending' => true],
                        ]
                    ]" />
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-lg-8">
                    <h2 class="title-xxlarge mb-4">Seleziona data e ora</h2>
                    <p class="lead mb-6">Scegli il giorno e l'orario per il tuo appuntamento</p>
                    
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-4">Disponibilità</h3>
                        <div class="grid grid-cols-3 md:grid-cols-6 gap-2">
                            @foreach($this->getAvailableDates() as $date)
                            <label class="block cursor-pointer">
                                <input type="radio" name="date" value="{{ $date['date'] }}" class="peer sr-only" {{ !$date['available'] ? 'disabled' : '' }} />
                                <div class="p-3 text-center border-2 border-gray-200 rounded-lg peer-checked:border-primary peer-checked:bg-primary/5 transition-all {{ !$date['available'] ? 'opacity-50 cursor-not-allowed' : 'hover:shadow-md' }}">
                                    <div class="text-xs text-gray-500">{{ $date['day'] }}</div>
                                    <div class="font-semibold">{{ \Carbon\Carbon::parse($date['date'])->format('d/m') }}</div>
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Orari disponibili</h3>
                        <div class="grid grid-cols-4 md:grid-cols-6 gap-2">
                            @foreach($this->getTimeSlots() as $slot)
                            <label class="block cursor-pointer">
                                <input type="radio" name="time" value="{{ $slot['time'] }}" class="peer sr-only" {{ !$slot['available'] ? 'disabled' : '' }} />
                                <div class="p-2 text-center border-2 border-gray-200 rounded-lg peer-checked:border-primary peer-checked:bg-primary/5 transition-all {{ !$slot['available'] ? 'opacity-50 cursor-not-allowed' : 'hover:shadow-md' }}">
                                    <div class="font-semibold">{{ $slot['time'] }}</div>
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <aside class="sticky-top top-100">
                        <x-blocks.info-box :data="[
                            'title' => 'Orari di apertura',
                            'content' => 'Lunedì-Venerdì: 9:00-13:00, 14:00-16:00',
                            'icon' => 'heroicon-o-clock',
                        ]" />
                    </aside>
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-12">
                    <div class="flex justify-between gap-4">
                        <a href="/it/tests/appuntamento-01-ufficio" class="btn btn-secondary px-6 py-3">
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
