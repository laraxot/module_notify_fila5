<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

// Route name
name('tests.view');

// Middleware for slug validation and page loading
middleware(PageSlugMiddleware::class);

// Volt component - reactive page
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

{{-- Layout with Volt --}}
<x-layouts.app>
    @volt('tests.view')
    <div>
        {{-- CMS page system - renders blocks from database --}}
        <x-page side="content" :slug="$pageSlug" :data="$data" />
    </div>
    @endvolt
</x-layouts.app>
