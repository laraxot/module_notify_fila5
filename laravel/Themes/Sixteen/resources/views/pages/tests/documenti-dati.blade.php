<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.documenti-dati');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = 'tests.documenti-dati';
    public array $data = [];
    
    public function getCategories(): array
    {
        return [
            ['label' => 'Tutti', 'value' => '', 'icon' => 'heroicon-o-document-text'],
            ['label' => 'Delibere', 'value' => 'delibere', 'icon' => 'heroicon-o-document'],
            ['label' => 'Regolamenti', 'value' => 'regolamenti', 'icon' => 'heroicon-o-book-open'],
            ['label' => 'Bilanci', 'value' => 'bilanci', 'icon' => 'heroicon-o-banknotes'],
            ['label' => 'Open Data', 'value' => 'opendata', 'icon' => 'heroicon-o-circle-stack'],
        ];
    }
    
    public function getDocuments(): array
    {
        return [
            ['title' => 'Delibera n. 123/2026', 'tipo' => 'Delibera', 'data' => '28/03/2026', 'icon' => 'heroicon-o-document', 'url' => '#'],
            ['title' => 'Regolamento urbanistico', 'tipo' => 'Regolamento', 'data' => '25/03/2026', 'icon' => 'heroicon-o-book-open', 'url' => '#'],
            ['title' => 'Bilancio 2026', 'tipo' => 'Bilancio', 'data' => '20/03/2026', 'icon' => 'heroicon-o-banknotes', 'url' => '#'],
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.documenti-dati')
    <div>
        <a class="skiplinks" href="#main">Vai al contenuto principale</a>
        
        <x-section slug="header" :data="$headerData ?? []" />
        
        <main class="container" id="main">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Documenti e Dati</li>
                </ol>
            </nav>
            
            <div class="row">
                <div class="col">
                    <h1 class="title-xxxlarge mb-4">Documenti e Dati</h1>
                    <p class="lead">Archivio documenti e open data</p>
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-12">
                    <x-blocks.form.search :data="['placeholder' => 'Cerca documento...']" />
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-12">
                    <x-blocks.filter.categories :data="['title' => 'Categorie', 'items' => $this->getCategories()]" />
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-12">
                    <h2 class="title-xxlarge mb-6">Ultimi documenti</h2>
                </div>
            </div>
            
            <div class="row g-4">
                @foreach($this->getDocuments() as $doc)
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ $doc['url'] }}" class="block p-6 border border-gray-200 rounded-lg hover:border-primary hover:shadow-md transition-all">
                        <div class="flex items-start gap-4">
                            <x-filament::icon :icon="$doc['icon']" class="w-10 h-10 text-primary flex-shrink-0" />
                            <div class="flex-1">
                                <h3 class="font-semibold mb-2">{{ $doc['title'] }}</h3>
                                <div class="text-sm text-gray-600">
                                    <span>{{ $doc['tipo'] }}</span> • <span>{{ $doc['data'] }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            
            <div class="row mt-8">
                <div class="col-12">
                    <x-blocks.navigation.pagination :data="['items' => $this->getDocuments()]" />
                </div>
            </div>
        </main>
        
        <x-section slug="footer" :data="$footerData ?? []" tpl="full" />
    </div>
    @endvolt
</x-layouts.app>
