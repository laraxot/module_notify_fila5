<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.view');
middleware(PageSlugMiddleware::class);

new class extends Component {
    // Folio automatically injects the route parameter as a public property
    public string $slug = '';
    
    public string $pageSlug = '';
    
    /** @var array<string, mixed> */
    public array $data = [];

    public function mount(): void
    {
        $this->pageSlug = 'tests.' . $this->slug;
        $this->data = ['slug' => $this->slug];
    }
};
?>

{{-- 
    Page: tests/[slug].blade.php
    
    ARCHITECTURE (DRY + KISS):
    - Questo file è il template Folio per le pagine di test
    - Estende x-layouts.app che include skip links, header e footer
    - Il contenuto pagina-specifico è delegato a <x-page>
    - NON include: skip links, header, footer - sono nel layout
    
    LAYOUT HIERARCHY:
    - x-layouts.main (components/layouts/main.blade.php): struttura base HTML
    - x-layouts.app (components/layouts/app.blade.php): wrapper frontend pubblico
    - Questo file: contenuto pagina-specifico
    
    VITE: @vite(['resources/css/app.css'], 'themes/Sixteen')
    
    DOCS: docs/layout-hierarchy.md
--}}

<x-layouts.app>
    @volt('tests.view')
        {{-- Main Content - Page-specific content only (NO header/footer/skiplink) --}}
        <x-page side="content" :slug="$pageSlug" :data="$data" />
    @endvolt
</x-layouts.app>
