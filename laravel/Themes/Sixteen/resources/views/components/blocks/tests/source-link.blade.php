@props([
    'source_url' => null,
    'title' => 'Pagina di riferimento',
])

@if($source_url)
<section class="border-t border-slate-200 bg-slate-50 py-6">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 text-sm sm:px-6 lg:px-8">
        <div>
            <p class="font-semibold text-slate-900">{{ $title }}</p>
            <p class="text-slate-600">Questa implementazione prende spunto dalla pagina statica ufficiale Design Comuni.</p>
        </div>
        <a href="{{ $source_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center rounded-xl border border-slate-300 px-4 py-2 font-medium text-slate-700 transition hover:border-emerald-300 hover:text-emerald-700">
            Apri la reference
        </a>
    </div>
</section>
@endif
