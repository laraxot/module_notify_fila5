{{--
    Heading Block - Bootstrap Italia Style
    Reference: https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazioni-elenco.html
--}}
@props(['data' => []])

@php
    $title = $data['title'] ?? '';
    $subtitle = $data['subtitle'] ?? '';
@endphp

<div class="cmp-heading p-0">
    <h1 class="title-xxxlarge">{{ $title }}</h1>
    @if($subtitle)
    <p class="subtitle-small">{{ $subtitle }}</p>
    @endif
</div>
