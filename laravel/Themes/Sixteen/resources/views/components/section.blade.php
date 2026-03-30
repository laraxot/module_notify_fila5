@props(['slug' => ''])

@php
    // Mappa slug a view componenti
    $sectionMap = [
        'header' => 'pub_theme::bootstrap-italia.header',
        'footer' => 'pub_theme::footer-comune',
    ];
    
    $viewName = $sectionMap[$slug] ?? null;
@endphp

@if($viewName && view()->exists($viewName))
    @include($viewName)
@else
    {{-- Fallback: cerca componente sections.{slug} --}}
    @includeIf('pub_theme::sections.' . $slug)
@endif
