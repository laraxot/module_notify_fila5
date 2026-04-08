<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.view');
middleware(PageSlugMiddleware::class);
?>

@php
    use Modules\Cms\Models\Page;

    $pageSlug = 'tests.'.$slug;
    $locale = app()->getLocale();

    // Fetch page from database
    $cmsPage = Page::where('slug', $pageSlug)->first();
    $blocks = [];

    if ($cmsPage) {
        $rawBlocks = $cmsPage->content_blocks[$locale] ?? $cmsPage->content_blocks['it'] ?? [];
        foreach ($rawBlocks as $blockData) {
            $blocks[] = (object) [
                'active' => true,
                'view' => $blockData['data']['view'] ?? '',
                'data' => $blockData['data'] ?? [],
            ];
        }
    }

    /** @var array<string, mixed> $data */
    $data = [
        'slug' => $slug,
    ];
@endphp

<x-layouts.app>
    <div id="main-container" @class(['container' => $slug === 'segnalazioni-elenco'])>
        <x-page :blocks="$blocks" side="content" :slug="$pageSlug" :data="$data" />
    </div>
</x-layouts.app>
