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

    /** @var array<int, object> */
    public array $blocks = [];

    /** @var array<string, mixed> */
    public array $data = [];

    public function mount(string $slug = ''): void
    {
        $this->slug = $slug;
        $this->pageSlug = $slug ? 'tests.'.$slug : 'tests';

        // Load blocks from CMS Page model
        $this->blocks = Page::getBlocksBySlug($this->pageSlug, 'content');

        $this->data = [
            'slug' => $slug,
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.view')
    {{-- Single root wrapper for Livewire --}}
    <div id="main-container" class="container cms-view-wrapper">
        {{-- Page content via CMS blocks --}}
        <div class="page-content content" data-slug="{{ $this->pageSlug }}" data-side="content">
            @foreach($this->blocks as $block)
                @include($block->view, array_merge(['data' => []], $block->data))
            @endforeach
        </div>
    </div>
    @endvolt
</x-layouts.app>
