<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.amministrazione');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = 'tests.amministrazione';
    public array $data = [];
    
    public function getSections(): array
    {
        return [
            ['title' => 'Organi di governo', 'description' => 'Sindaco, Giunta, Consiglio', 'icon' => 'heroicon-o-building-office', 'url' => '#'],
            ['title' => 'Aree amministrative', 'description' => 'Settori e uffici', 'icon' => 'heroicon-o-briefcase', 'url' => '#'],
            ['title' => 'Uffici', 'description' => 'Contatti e orari', 'icon' => 'heroicon-o-map-pin', 'url' => '#'],
            ['title' => 'Enti e fondazioni', 'description' => 'Enti partecipati', 'icon' => 'heroicon-o-academic-cap', 'url' => '#'],
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.amministrazione')
    <div>
        <a class="skiplinks" href="#main">Vai al contenuto principale</a>
        
        <x-section slug="header" :data="$headerData ?? []" />
        
        <main class="container" id="main">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Amministrazione</li>
                </ol>
            </nav>
            
            <div class="row">
                <div class="col">
                    <h1 class="title-xxxlarge mb-4">Amministrazione</h1>
                    <p class="lead">Organi di governo e uffici comunali</p>
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-12">
                    <h2 class="title-xxlarge mb-6">Sezioni</h2>
                </div>
            </div>
            
            <div class="row g-4">
                @foreach($this->getSections() as $section)
                <div class="col-12 col-md-6">
                    <a href="{{ $section['url'] }}" class="block p-6 border-2 border-gray-200 rounded-lg hover:border-primary hover:shadow-md transition-all">
                        <div class="flex items-start gap-4">
                            <x-filament::icon :icon="$section['icon']" class="w-12 h-12 text-primary flex-shrink-0" />
                            <div>
                                <h3 class="font-semibold text-lg mb-2">{{ $section['title'] }}</h3>
                                <p class="text-gray-600">{{ $section['description'] }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </main>
        
        <x-section slug="footer" :data="$footerData ?? []" tpl="full" />
    </div>
    @endvolt
</x-layouts.app>
