@props([
    'items' => [],
    'title' => 'Indice della pagina',
])

<aside class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm lg:sticky lg:top-24">
    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-slate-500">{{ $title }}</p>
    <nav class="mt-5">
        <ul class="space-y-2">
            @foreach ($items as $item)
                <li>
                    <a
                        href="#{{ $item['anchor'] }}"
                        class="block rounded-2xl px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100 hover:text-emerald-700"
                    >
                        {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</aside>
