@props([
    'eyebrow' => null,
    'title' => 'Titolo pagina',
    'subtitle' => null,
    'content' => null,
    'background' => 'white',
])

@php
$backgroundClass = [
    'white' => 'bg-white',
    'muted' => 'bg-slate-50',
    'brand' => 'bg-emerald-700 text-white',
][$background] ?? 'bg-white';

$textClass = $background === 'brand' ? 'text-white' : 'text-slate-900';
$subtitleClass = $background === 'brand' ? 'text-emerald-50' : 'text-slate-600';
@endphp

<section class="{{ $backgroundClass }} border-b border-slate-200">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
        <div class="max-w-3xl">
            @if($eyebrow)
                <p class="text-sm font-semibold uppercase tracking-[0.22em] {{ $background === 'brand' ? 'text-emerald-100' : 'text-emerald-700' }}">{{ $eyebrow }}</p>
            @endif
            <h1 class="mt-3 text-4xl font-bold tracking-tight {{ $textClass }} sm:text-5xl">{{ $title }}</h1>
            @if($subtitle)
                <p class="mt-4 text-lg leading-8 {{ $subtitleClass }}">{{ $subtitle }}</p>
            @endif
            @if($content)
                <div class="mt-5 text-base leading-7 {{ $subtitleClass }} [&_p]:mt-0 [&_p]:mb-4">{!! $content !!}</div>
            @endif
        </div>
    </div>
</section>
