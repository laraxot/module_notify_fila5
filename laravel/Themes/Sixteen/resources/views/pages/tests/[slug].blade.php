<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.view');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $slug = '';
    public string $pageSlug = '';
    public array $data = [];

    public function mount(string $slug): void
    {
        $this->slug = $slug;
        $this->pageSlug = 'tests.'.$slug;
        $this->data = [
            'slug' => $slug
        ];
    }
};

?>

<x-layouts.app>
@volt('tests.view')
<div>
    {{-- Skip Links --}}
    <div class="skiplink">
      <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
      <a class="visually-hidden-focusable" href="#footer">Vai al footer</a>
    </div><!-- /skiplink -->
    
    {{-- Header Section - USE X-SECTION --}}
    <x-section slug="header" />
    
    {{-- Main Content --}}
    <main id="main-container">
        @if(isset($this->data['error']))
            <div class="container py-8">
                <div class="alert alert-danger" role="alert">
                    <h2 class="h4 mb-2">Pagina non trovata</h2>
                    <p>La pagina <code>{{ $this->slug }}</code> non esiste.</p>
                    <a href="/it/tests/" class="btn btn-primary mt-3">Torna all'indice</a>
                </div>
            </div>
        @else
            @foreach($this->getContentBlocks() as $block)
                @if(isset($block['type']) && isset($block['data']['view']))
                    @includeIf($block['data']['view'], ['data' => $block['data']])
                @endif
            @endforeach
        @endif
    </main>
    
    {{-- Footer Section --}}
    <x-section slug="footer" tpl="full" />
</div>
@endvolt
</x-layouts.app>
