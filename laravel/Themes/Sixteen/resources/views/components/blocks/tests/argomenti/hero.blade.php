@php
$eyebrow = $eyebrow ?? 'Design Comuni / Test';
$title = $title ?? 'Argomenti';
$description = $description ?? 'Esplora i contenuti del Comune per area tematica.';
@endphp

<section class="bg-slate-50">
    <div class="mx-auto max-w-7xl px-4 pt-12 sm:px-6 lg:px-8 lg:pt-16">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-sky-700">{{ $eyebrow }}</p>
            <h1 class="mt-3 text-4xl font-semibold tracking-tight text-slate-900 sm:text-5xl">{{ $title }}</h1>
            <p class="mt-4 text-base leading-7 text-slate-600 sm:text-lg">{{ $description }}</p>
        </div>
    </div>
</section>
