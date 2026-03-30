@php
$sourceUrl = $source_url ?? null;
@endphp

<section class="bg-white">
    <div class="mx-auto max-w-5xl px-4 pb-12 sm:px-6 lg:px-8 lg:pb-16">
        <div class="rounded-[2rem] border border-slate-200 bg-slate-50 p-8">
            <h2 class="text-lg font-semibold text-slate-900">Fonte di riferimento</h2>
            @if($sourceUrl)
                <a href="{{ $sourceUrl }}" class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-sky-700 hover:text-sky-900">
                    Apri il template sorgente ufficiale
                    <span aria-hidden="true">/</span>
                </a>
            @else
                <p class="mt-4 text-sm leading-6 text-slate-600">Sorgente ufficiale non indicata nel blocco.</p>
            @endif
        </div>
    </div>
</section>
