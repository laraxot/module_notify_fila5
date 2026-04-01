<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.index');
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
        {{-- Header Section --}}
        <x-section slug="header" />

        {{-- Main Content --}}
        <main id="main-container">
            <x-page side="content" :slug="$pageSlug" :data="$data" />
        </main>

        {{-- Footer Section --}}
        <x-section slug="footer" tpl="full" />
    </div>
    @endvolt
</x-layouts.app>
