{{--
|--------------------------------------------------------------------------
| Footer Section Component
|--------------------------------------------------------------------------
|
| Usage:
|   <x-section slug="footer" />
|   <x-section slug="footer" tpl="slim" />
|   <x-section slug="footer" tpl="default" />
|
| Templates:
|   - default: Footer completo Design Comuni (3 sezioni)
|   - slim: Footer minimale (solo bottom bar)
|
--}}

@props([
    'slug' => 'footer',
    'tpl' => 'default',
])

@php
    $template = $tpl ?? 'default';
    $viewPath = 'pub_theme::sections.footer.' . $template;
@endphp

@if(view()->exists($viewPath))
    @include($viewPath)
@else
    {{-- Fallback: default footer --}}
    @include('pub_theme::sections.footer.default')
@endif
