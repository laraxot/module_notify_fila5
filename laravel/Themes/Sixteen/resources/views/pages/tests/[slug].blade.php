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

    public function mount(string $slug = ''): void
    {
        $this->pageSlug = 'tests.' . $slug;
        $this->data = [
            'slug' => $slug,
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.view')
        <div>
            <x-page side="content" :slug="$pageSlug" :data="$data" />
        </div>
||||||| parent of cd7c42a6 (feat: Create test pages with Filament 5 standards)
=======
use function Laravel\Folio\name;
use Livewire\Volt\Component;

name('tests.view');

new class extends Component {
    public string $slug = '';
    public string $pageSlug = '';
    public array $data = [];
    public ?array $pageData = null;

    public function mount(string $slug): void
    {
        $this->slug = $slug;
        $this->pageSlug = 'tests.' . $slug;
        
        // Load page data from JSON
        $jsonPath = config_path('local/fixcity/database/content/pages/' . $this->pageSlug . '.json');
        
        if (file_exists($jsonPath)) {
            $content = file_get_contents($jsonPath);
            $this->pageData = json_decode($content, true);
            
            $this->data = [
                'title' => $this->pageData['title']['it'] ?? ucfirst($slug),
                'slug' => $slug,
                'content_blocks' => $this->pageData['content_blocks']['it'] ?? [],
            ];
        } else {
            $this->data = [
                'title' => 'Pagina non trovata',
                'slug' => $slug,
                'error' => true,
            ];
        }
    }

    public function getContentBlocks(): array
    {
        return $this->data['content_blocks'] ?? [];
    }

    public function getPageTitle(): string
    {
        return $this->data['title'] ?? ucfirst($this->slug);
    }
};

?>

<x-layouts.app>
    @volt('tests.view')
    <div>
        {{-- Skip Links --}}
        <a class="skiplinks" href="#main">Vai al contenuto principale</a>

        {{-- Header --}}
        <x-section slug="header" :data="$headerData ?? []" />

        {{-- Main Content --}}
        <main class="container py-8" id="main">
            @if(isset($this->data['error']))
                {{-- Error: Page not found --}}
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <h2 class="h4 mb-2">Pagina non trovata</h2>
                            <p>La pagina <code>tests.{{ $this->slug }}</code> non esiste.</p>
                            <a href="/it/tests/" class="btn btn-primary">
                                Torna all'indice
                            </a>
                        </div>
                    </div>
                </div>
            @else
                {{-- Page Title --}}
                <div class="row mb-8">
                    <div class="col-12">
                        <h1 class="title-xxxlarge mb-4">{{ $this->getPageTitle() }}</h1>
                        <p class="text-muted">
                            <code>Slug: {{ $this->slug }}</code>
                        </p>
                    </div>
                </div>

                {{-- Content Blocks --}}
                @foreach($this->getContentBlocks() as $block)
                    @if(isset($block['type']) && isset($block['data']['view']))
                        @includeIf($block['data']['view'], ['data' => $block['data']])
                    @endif
                @endforeach

                {{-- Debug Info (remove in production) --}}
                <div class="row mt-8">
                    <div class="col-12">
                        <div class="p-4 bg-gray-100 rounded">
                            <h3 class="h5 mb-2">Debug Info</h3>
                            <p class="text-sm">
                                <strong>Page Slug:</strong> {{ $this->pageSlug }}<br>
                                <strong>Content Blocks:</strong> {{ count($this->getContentBlocks()) }}<br>
                                <strong>JSON File:</strong> <code>config/local/fixcity/database/content/pages/{{ $this->pageSlug }}.json</code>
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </main>

        {{-- Footer --}}
        <x-section slug="footer" :data="$footerData ?? []" tpl="full" />
    </div>
>>>>>>> cd7c42a6 (feat: Create test pages with Filament 5 standards)
    @endvolt
</x-layouts.app>
