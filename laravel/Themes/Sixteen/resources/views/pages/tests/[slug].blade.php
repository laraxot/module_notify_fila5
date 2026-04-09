<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Models\Page;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.view');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $slug = '';
    public string $pageSlug = '';

    /** @var array<string, mixed> */
    public array $data = [];

    public function mount(string $slug = ''): void
    {
        $this->slug = $slug;
        $this->pageSlug = $slug ? 'tests.'.$slug : 'tests';

        $this->data = [
            'slug' => $slug,
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.view')
    <div class="cms-view-wrapper">
        @php
            $blocks = Page::getBlocksBySlug($this->pageSlug, 'content');
        @endphp

        <div class="page-content content" data-slug="{{ $this->pageSlug }}" data-side="content">
            @foreach($blocks as $block)
                @include($block->view, array_merge($this->data, ['data' => $block->data]))
            @endforeach
        </div>
    </div>
    @endvolt
</x-layouts.app>
