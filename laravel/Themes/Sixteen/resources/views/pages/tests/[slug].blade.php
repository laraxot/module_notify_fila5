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

    /** @var array<string, mixed> */
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

        {{-- Header Section --}}
        <x-section slug="header" />

        {{-- Main Content - Rendered via x-page component with JSON blocks --}}
        <main id="main-container">
            <x-page side="content" :slug="$pageSlug" :data="$data" />
        </main>

        {{-- Footer Section --}}
        <x-section slug="footer" tpl="full" />
    </div>
    @endvolt
</x-layouts.app>
