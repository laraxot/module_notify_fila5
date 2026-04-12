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

    /** @var array<int, object> */
    public array $blocks = [];

    public function mount(string $slug = ''): void
    {
        $this->slug = $slug;
        $this->pageSlug = $slug ? 'tests.'.$slug : 'tests';
        $this->data = ['slug' => $slug];
        $this->blocks = Page::getBlocksBySlug($this->pageSlug, 'content');
    }
};
?>

<x-layouts.app>
    @volt('tests.view')
    <div class="tests-view-wrapper">
        @foreach($blocks as $block)
            @include($block->view, array_merge($data, ['data' => $block->data]))
        @endforeach
    </div>
    @endvolt
</x-layouts.app>
