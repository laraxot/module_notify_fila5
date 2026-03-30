<?php

declare(strict_types=1);

use Modules\Cms\Models\Page as PageModel;

?>
@props([
    'side' => 'content',
    'slug' => '',
    'data' => [],
])

@php
    $resolvedSlug = $slug;

    if ($resolvedSlug === '' && isset($data['slug']) && is_string($data['slug'])) {
        $resolvedSlug = $data['slug'];
    }

    $blocks = PageModel::getBlocksBySlug($resolvedSlug, $side);
@endphp

@if(!empty($blocks))
    <div class="page-{{ $side }}-content" data-slug="{{ $resolvedSlug }}" data-side="{{ $side }}">
        @foreach($blocks as $block)
            @include($block->view, array_merge($data, $block->data))
        @endforeach
    </div>
@else
    <div class="page-{{ $side }}-content" data-slug="{{ $resolvedSlug }}" data-side="{{ $side }}">
        <div class="mx-auto max-w-3xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-amber-200 bg-amber-50 p-6 text-amber-900">
                <h2 class="text-lg font-semibold">Pagina non configurata</h2>
                <p class="mt-2 text-sm leading-6">
                    Nessun blocco disponibile per lo slug <code>{{ $resolvedSlug }}</code> sul lato <code>{{ $side }}</code>.
                </p>
            </div>
        </div>
    </div>
@endif
