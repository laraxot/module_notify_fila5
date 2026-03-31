<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.novita-dettaglio');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = 'tests.novita-dettaglio';
    public array $data = [];
    
    public function getArticle(): array
    {
        return [
            'title' => 'Nuovo orario uffici comunali',
            'date' => '28 marzo 2026',
            'category' => 'Comune',
            'author' => 'Ufficio Comunicazione',
            'views' => '1234',
            'content' => '<p>Dal 1 aprile 2026 cambia l\'orario di apertura al pubblico degli uffici comunali. Gli uffici saranno aperti dal lunedì al venerdì dalle 9:00 alle 13:00 e dalle 14:00 alle 16:00. Il sabato gli uffici rimarranno chiusi.</p><p>Per informazioni contattare l\'URP al numero 02 1234 5678 o via email urp@comune.example.it</p>',
        ];
    }
    
    public function getRelated(): array
    {
        return [
            ['title' => 'Festa di primavera', 'date' => '25/03/2026', 'icon' => 'heroicon-o-calendar', 'url' => '#'],
            ['title' => 'Avviso raccolta rifiuti', 'date' => '22/03/2026', 'icon' => 'heroicon-o-bell', 'url' => '#'],
            ['title' => 'Bando contributi affitti', 'date' => '20/03/2026', 'icon' => 'heroicon-o-document-text', 'url' => '#'],
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.novita-dettaglio')
    <div>
        <a class="skiplinks" href="#main">Vai al contenuto principale</a>
        
        <x-section slug="header" :data="$headerData ?? []" />
        
        <main class="container" id="main">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="/it/tests/novita">Novità</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dettaglio</li>
                </ol>
            </nav>
            
            <article class="row mt-8">
                <div class="col-lg-8">
                    <header class="mb-8">
                        <div class="flex items-center gap-4 text-sm text-gray-600 mb-4">
                            <span class="px-2 py-1 bg-primary/10 text-primary rounded-full">{{ $this->getArticle()['category'] }}</span>
                            <span>{{ $this->getArticle()['date'] }}</span>
                        </div>
                        <h1 class="title-xxxlarge mb-4">{{ $this->getArticle()['title'] }}</h1>
                        <div class="flex items-center gap-4 text-sm text-gray-600">
                            <span>Di {{ $this->getArticle()['author'] }}</span>
                            <span>•</span>
                            <span>{{ $this->getArticle()['views'] }} visualizzazioni</span>
                        </div>
                    </header>
                    
                    <div class="prose prose-lg max-w-none">
                        {!! $this->getArticle()['content'] !!}
                    </div>
                    
                    <div class="mt-8 pt-8 border-t">
                        <h3 class="text-lg font-semibold mb-4">Condividi</h3>
                        <div class="flex gap-2">
                            <button class="p-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                <x-filament::icon icon="ui-brands.facebook" class="w-5 h-5" />
                            </button>
                            <button class="p-2 bg-sky-500 text-white rounded hover:bg-sky-600">
                                <x-filament::icon icon="ui-brands.twitter" class="w-5 h-5" />
                            </button>
                            <button class="p-2 bg-green-500 text-white rounded hover:bg-green-600">
                                <x-filament::icon icon="ui-brands.whatsapp" class="w-5 h-5" />
                            </button>
                            <button class="p-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                                <x-filament::icon icon="heroicon-o-envelope" class="w-5 h-5" />
                            </button>
                        </div>
                    </div>
                </div>
                
                <aside class="col-lg-4">
                    <div class="sticky-top top-100">
                        <h3 class="text-lg font-semibold mb-4">Notizie correlate</h3>
                        <div class="space-y-4">
                            @foreach($this->getRelated() as $item)
                            <a href="{{ $item['url'] }}" class="block p-4 border border-gray-200 rounded-lg hover:border-primary hover:shadow-sm transition-all">
                                <div class="flex items-start gap-3">
                                    <x-filament::icon :icon="$item['icon']" class="w-8 h-8 text-primary flex-shrink-0" />
                                    <div>
                                        <h4 class="font-medium text-sm mb-1">{{ $item['title'] }}</h4>
                                        <span class="text-xs text-gray-600">{{ $item['date'] }}</span>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </article>
        </main>
        
        <x-section slug="footer" :data="$footerData ?? []" tpl="full" />
    </div>
    @endvolt
</x-layouts.app>
