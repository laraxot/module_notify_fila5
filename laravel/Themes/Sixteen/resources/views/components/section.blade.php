{{--
    Section Dispatcher Component
    Maps section slugs to their corresponding views
    
    Usage:
    <x-section slug="header" />
    <x-section slug="footer" />
    <x-section slug="footer" tpl="slim" />
--}}

@props(['slug' => '', 'tpl' => 'full'])

@php
    // Mappa slug a view componenti
    $sectionMap = [
        'header' => 'pub_theme::bootstrap-italia.header',
        'footer' => 'pub_theme::sections.footer',
    ];
    
    $viewName = $sectionMap[$slug] ?? null;
@endphp

@if($viewName && view()->exists($viewName))
    @include($viewName, ['tpl' => $tpl])
@else
    {{-- Fallback: cerca componente sections.{slug} --}}
    @includeIf('pub_theme::sections.' . $slug, ['tpl' => $tpl])
@endif
