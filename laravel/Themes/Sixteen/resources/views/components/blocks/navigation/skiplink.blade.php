{{-- Skiplink AGID - Accessibility skip navigation --}}

@props([
    'contentTarget' => '#main-container',
    'footerTarget' => '#footer',
])

<div class="skiplink">
    <a class="visually-hidden-focusable" href="{{ $contentTarget }}">Vai ai contenuti</a>
    <a class="visually-hidden-focusable" href="{{ $footerTarget }}">Vai al footer</a>
</div>
