<?php

declare(strict_types=1);

<<<<<<< HEAD
use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.view');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = '';

    /** @var array<string, mixed> */
    public array $data = [];

    public function mount(): void
    {
        $this->pageSlug = 'tests.index';
        $this->data = [];
    }
};
?>
<x-layouts.app>
    @volt('tests.index')
        <div>
            <x-page side="content" :slug="$pageSlug" :data="$data" />
        </div>
||||||| parent of 6d5d0bb2 (fix: Update docs to Filament 5 (was incorrectly referencing 3.x))
=======
use function Laravel\Folio\name;
use Livewire\Volt\Component;

name('tests.index');

new class extends Component {
    public string $pageSlug = 'tests.index';
    public array $data = [];

    public function mount(): void
    {
        $this->data = [
            'title' => 'Design Comuni Test Pages',
            'description' => 'Elenco di tutte le pagine di test disponibili',
        ];
    }

    public function getAvailablePages(): array
    {
        $jsonPath = config_path('local/fixcity/database/content/pages/');
        $files = glob($jsonPath . 'tests.*.json');
        
        $pages = [];
        foreach ($files as $file) {
            $basename = basename($file, '.json');
            $slug = str_replace('tests.', '', $basename);
            
            if ($slug === 'index') {
                continue;
            }
            
            $content = file_get_contents($file);
            $data = json_decode($content, true);
            
            $pages[] = [
                'slug' => $slug,
                'title' => $data['title']['it'] ?? ucfirst($slug),
                'category' => $data['category'] ?? 'Generali',
                'url' => '/it/tests/' . $slug,
            ];
        }
        
        // Sort by category then title
        usort($pages, function($a, $b) {
            $catCompare = strcmp($a['category'], $b['category']);
            if ($catCompare !== 0) {
                return $catCompare;
            }
            return strcmp($a['title'], $b['title']);
        });
        
        return $pages;
    }
};

?>

<x-layouts.app>
    @volt('tests.index')
    <div>
        {{-- Skip Links --}}
        <a class="skiplinks" href="#main">Vai al contenuto principale</a>

        {{-- Header --}}
        <x-section slug="header" :data="$headerData ?? []" />

        {{-- Main Content --}}
        <main class="container py-8" id="main">
            <div class="row">
                <div class="col-12">
                    <h1 class="title-xxxlarge mb-4">Design Comuni Test Pages</h1>
                    <p class="lead mb-8">
                        Pagine di test per il design system Bootstrap Italia convertito a Tailwind CSS 4.
                        Tutte le pagine sono accessibili tramite route dinamica <code>/it/tests/{slug}</code>.
                    </p>

                    {{-- Stats --}}
                    @php
                        $pages = $this->getAvailablePages();
                        $categories = array_unique(array_column($pages, 'category'));
                    @endphp
                    <div class="row g-4 mb-8">
                        <div class="col-12 col-md-4">
                            <div class="card card-bg shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <svg class="icon icon-primary me-3" aria-hidden="true">
                                            <use xlink:href="{{ asset('themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-file') }}"></use>
                                        </svg>
                                        <div>
                                            <h3 class="h5 mb-0">{{ count($pages) }}</h3>
                                            <p class="text-sm text-muted mb-0">Pagine totali</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card card-bg shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <svg class="icon icon-success me-3" aria-hidden="true">
                                            <use xlink:href="{{ asset('themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-check') }}"></use>
                                        </svg>
                                        <div>
                                            <h3 class="h5 mb-0">{{ count($categories) }}</h3>
                                            <p class="text-sm text-muted mb-0">Categorie</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card card-bg shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <svg class="icon icon-warning me-3" aria-hidden="true">
                                            <use xlink:href="{{ asset('themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-code') }}"></use>
                                        </svg>
                                        <div>
                                            <h3 class="h5 mb-0">Bootstrap Italia</h3>
                                            <p class="text-sm text-muted mb-0">Design System</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Pages by Category --}}
                    @foreach($categories as $category)
                    <section class="mb-8">
                        <h2 class="title-xxlarge mb-4">{{ $category }}</h2>
                        <div class="row g-4">
                            @foreach(array_filter($pages, fn($p) => $p['category'] === $category) as $page)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card-wrapper card-space">
                                    <div class="card card-bg">
                                        <div class="card-body">
                                            <h3 class="card-title h5">
                                                <a href="{{ $page['url'] }}" class="text-decoration-none">
                                                    {{ $page['title'] }}
                                                </a>
                                            </h3>
                                            <p class="card-text text-sm">
                                                <code class="text-xs">{{ $page['slug'] }}</code>
                                            </p>
                                            <a href="{{ $page['url'] }}" class="read-more">
                                                <span class="text">Vai alla pagina</span>
                                                <svg class="icon icon-primary icon-xs" aria-hidden="true">
                                                    <use xlink:href="{{ asset('themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-arrow-right') }}"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    @endforeach

                    {{-- Documentation --}}
                    <section class="mt-8 p-6 bg-gray-50 rounded-lg">
                        <h2 class="title-xlarge mb-4">Documentazione</h2>
                        <ul class="list-disc list-inside space-y-2">
                            <li>
                                <a href="/themes/sixteen/docs/design-comuni/README.md" class="text-primary hover:underline" target="_blank">
                                    Design Comuni README
                                </a>
                            </li>
                            <li>
                                <a href="/themes/sixteen/docs/design-comuni/BOOTSTRAP_ITALIA_HTML_IDENTICAL_GUIDE.md" class="text-primary hover:underline" target="_blank">
                                    HTML Identical Guide
                                </a>
                            </li>
                            <li>
                                <a href="/themes/sixteen/docs/design-comuni/screenshots/" class="text-primary hover:underline" target="_blank">
                                    Screenshots & Analysis
                                </a>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
        </main>

        {{-- Footer --}}
        <x-section slug="footer" :data="$footerData ?? []" tpl="full" />
    </div>
>>>>>>> 6d5d0bb2 (fix: Update docs to Filament 5 (was incorrectly referencing 3.x))
    @endvolt
</x-layouts.app>
