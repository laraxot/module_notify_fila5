@php
$title = $title ?? 'Serve orientamento?';
$description = $description ?? 'Se non trovi subito l\'argomento giusto, puoi partire dai servizi o chiedere assistenza.';
$primary_action = $primary_action ?? null;
$secondary_action = $secondary_action ?? null;
@endphp

<section class="bg-white">
    <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8 lg:pb-16">
        <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <h2 class="text-2xl font-semibold text-slate-900">{{ $title }}</h2>
                    <p class="mt-3 text-base leading-7 text-slate-600">{{ $description }}</p>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row">
                    @if(is_array($primary_action))
                        <a href="{{ $primary_action['url'] ?? '#' }}" class="inline-flex items-center justify-center rounded-full bg-sky-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-sky-800">{{ $primary_action['label'] ?? 'Apri' }}</a>
                    @endif
                    @if(is_array($secondary_action))
                        <a href="{{ $secondary_action['url'] ?? '#' }}" class="inline-flex items-center justify-center rounded-full border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:bg-slate-50">{{ $secondary_action['label'] ?? 'Apri' }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
