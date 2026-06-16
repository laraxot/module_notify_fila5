@props([
    'eyebrow' => null,
    'title' => '',
    'description' => null,
    'icon' => null,
    'tone' => 'default',
])

@php
    $panelClasses = $tone === 'success'
        ? 'border-emerald-200 bg-emerald-50/80'
        : 'border-slate-200 bg-white';
    $iconWrapClasses = 'bg-emerald-100 text-emerald-700';
@endphp

<section class="rounded-[2rem] border {{ $panelClasses }} p-8 shadow-sm sm:p-10">
    @if (is_string($eyebrow) && $eyebrow !== '')
        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-emerald-700">{{ $eyebrow }}</p>
    @endif

    <div class="mt-4 flex flex-col gap-5 sm:flex-row sm:items-start">
        @if (is_string($icon) && $icon !== '')
            <div class="inline-flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl {{ $iconWrapClasses }}">
                <x-filament::icon :name="$icon" class="h-7 w-7" />
            </div>
        @endif

        <div>
            <h1 class="text-4xl font-bold tracking-tight text-slate-950 sm:text-5xl">{{ $title }}</h1>

            @if (is_string($description) && $description !== '')
                <p class="mt-4 max-w-3xl text-lg leading-8 text-slate-600">{{ $description }}</p>
            @endif
        </div>
    </div>
</section>
