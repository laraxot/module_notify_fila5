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
            'slug' => $slug,
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.view')
    {{-- Single root wrapper for Livewire --}}
    <div class="tests-view-wrapper">
        @php
            // Load blocks from CMS Page model
            $blocks = \Modules\Cms\Models\Page::getBlocksBySlug($this->pageSlug, 'content');
        @endphp

        {{-- Main Content - Page-specific content only (NO header/footer/skiplink) --}}
        <div class="page-content content" data-slug="{{ $this->pageSlug }}" data-side="content">
            @foreach($blocks as $block)
                @include($block->view, array_merge(['data' => []], $block->data))
            @endforeach
        </div>
    </div>
    @endvolt
</x-layouts.app>
