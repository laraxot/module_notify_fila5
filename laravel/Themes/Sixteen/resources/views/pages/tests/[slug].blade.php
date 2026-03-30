<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;

// Route: /it/tests/{slug}
name('tests.view');

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
            'slug' => $slug,
            'title' => 'Design Comuni - '.$slug,
        ];
    }
};

?>

<x-layouts.app>
    @volt('tests.view')
    <div class="design-comuni-page">
        {{-- Header Section --}}
        <x-section slug="header" />

        {{-- Dynamic Page Content --}}
        <x-page side="content" :slug="$pageSlug" :data="$data" />

        {{-- Footer Section --}}
        <x-section slug="footer" />
    </div>
    @endvolt
</x-layouts.app>
