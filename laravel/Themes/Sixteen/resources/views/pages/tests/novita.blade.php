<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.novita');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = 'tests.novita';
    public array $data = [];
    
    public function getCategories(): array
    {
        return [
            ['label' => 'Tutte', 'value' => '', 'icon' => 'heroicon-o-newspaper'],
            ['label' => 'Comune', 'value' => 'comune', 'icon' => 'heroicon-o-building-office'],
            ['label' => 'Eventi', 'value' => 'eventi', 'icon' => 'heroicon-o-calendar'],
            ['label' => 'Avvisi', 'value' => 'avvisi', 'icon' => 'heroicon-o-bell'],
            ['label' => 'Bandi', 'value' => 'bandi', 'icon' => 'heroicon-o-document-text'],
        ];
    }
    
    public function getNews(): array
    {
        return [
            ['title' => 'Nuovo orario uffici comunali', 'excerpt' => 'Dal 1 aprile cambia l'orario di apertura al pubblico', 'date' => '2026-03-28', 'category' => 'comune', 'icon' => 'heroicon-o-building-office', 'url' => '#'],
            ['title' => 'Festa di primavera', 'excerpt' => 'Domenica prossima festa in piazza per tutti i cittadini', 'date' => '2026-03-25', 'category' => 'eventi', 'icon' => 'heroicon-o-calendar', 'url' => '#'],
            ['title' => 'Avviso raccolta rifiuti', 'excerpt' => 'Modifica calendario raccolta per pasqua', 'date' => '2026-03-22', 'category' => 'avvisi', 'icon' => 'heroicon-o-bell', 'url' => '#'],
            ['title' => 'Bando contributi affitti', 'excerpt' => 'Aperti i termini per presentare domande', 'date' => '2026-03-20', 'category' => 'bandi', 'icon' => 'heroicon-o-document-text', 'url' => '#'],
            ['title' => 'Nuova biblioteca digitale', 'excerpt' => 'Attivato servizio prestito ebook gratuito', 'date' => '2026-03-18', 'category' => 'comune', 'icon' => 'heroicon-o-building-office', 'url' => '#'],
            ['title' => 'Mercatino dell'artigianato', 'excerpt' => 'Weekend di eventi in centro storico', 'date' => '2026-03-15', 'category' => 'eventi', 'icon' => 'heroicon-o-calendar', 'url' => '#'],
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.novita')
    <div>
        <a class="skiplinks" href="#main">Vai al contenuto principale</a>
        
        <x-section slug="header" :data="$headerData ?? []" />
        
        <main class="container" id="main">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Novità</li>
                </ol>
            </nav>
            
            <div class="row">
                <div class="col">
                    <h1 class="title-xxxlarge mb-4">Novità</h1>
                    <p class="lead">Ultime notizie dal Comune</p>
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-12">
                    <x-blocks.filter.categories :data="['title' => 'Categorie', 'items' => $this->getCategories()]" />
                </div>
            </div>
            
            <div class="row mt-8">
                <div class="col-12">
                    <h2 class="title-xxlarge mb-6">Ultime notizie</h2>
                </div>
            </div>
            
            <div class="row g-4">
                @foreach($this->getNews() as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <x-blocks.card.card :data="$item" />
                </div>
                @endforeach
            </div>
            
            <div class="row mt-8">
                <div class="col-12">
                    <x-blocks.navigation.pagination :data="['items' => $this->getNews()]" />
                </div>
            </div>
        </main>
        
        <x-section slug="footer" :data="$footerData ?? []" tpl="full" />
    </div>
    @endvolt
</x-layouts.app>
