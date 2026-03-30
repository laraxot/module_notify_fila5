@php
$items = $items ?? [];
@endphp

@if(! empty($items))
<section class="bg-slate-50">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-12">
        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @foreach($items as $item)
                <article class="flex h-full flex-col rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                    <div class="flex items-start justify-between gap-4">
                        <h2 class="text-xl font-semibold text-slate-900">{{ $item['title'] ?? '' }}</h2>
                        <span class="mt-1 inline-flex h-10 w-10 items-center justify-center rounded-full bg-sky-100 text-sky-700">
                            <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5" aria-hidden="true">
                                <path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                    <p class="mt-4 flex-1 text-sm leading-6 text-slate-600">{{ $item['description'] ?? '' }}</p>
                    <a href="{{ $item['href'] ?? '#' }}" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-sky-700 hover:text-sky-900">
                        {{ $item['label'] ?? "Vai all'argomento" }}
                        <span aria-hidden="true">/</span>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif
