@props([
    'title' => 'Esplora per argomento',
    'subtitle' => null,
    'items' => [],
    'id' => 'argomenti-grid',
])

<section id="{{ $id }}" class="bg-white py-16 md:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-emerald-700">Argomenti</p>
            <h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-900 md:text-4xl">{{ $title }}</h2>
            @if($subtitle)
                <p class="mt-4 text-lg leading-8 text-slate-600">{{ $subtitle }}</p>
            @endif
        </div>

        <div class="mt-10 grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
            @foreach($items as $item)
                <a
                    href="{{ $item['href'] ?? '#' }}"
                    class="group rounded-3xl border border-slate-200 bg-slate-50 p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-emerald-300 hover:bg-white hover:shadow-lg"
                >
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h3 class="text-xl font-semibold text-slate-900 group-hover:text-emerald-800">
                                {{ $item['title'] ?? '' }}
                            </h3>
                            @if(!empty($item['description']))
                                <p class="mt-3 text-sm leading-6 text-slate-600">
                                    {{ $item['description'] }}
                                </p>
                            @endif
                        </div>
                        <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-700">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H9M17 7v8" />
                            </svg>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
