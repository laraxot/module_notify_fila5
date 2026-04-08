<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.view');
middleware(PageSlugMiddleware::class);
?>

@php
    $pageSlug = 'tests.'.$slug;

    /** @var array<string, mixed> $data */
    $data = [
        'slug' => $slug,
    ];
@endphp

<x-layouts.app>
    <div id="main-container" @class(['container' => $slug === 'segnalazioni-elenco'])>
        <x-page side="content" :slug="$pageSlug" :data="$data" />
    </div>
</x-layouts.app>
