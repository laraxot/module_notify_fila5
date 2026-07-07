@php
$title = $title ?? 'Pagina di test';
$summary = $summary ?? 'Template Design Comuni mappato nel runtime CMS.';
$category = $category ?? 'Design Comuni';
$sourceUrl = $source_url ?? null;
$slug = $slug ?? null;
@endphp

<section class="bg-slate-50">
    <div class="mx-auto max-w-5xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.22em] text-sky-700">{{ $category }}</p>
                    <h1 class="mt-3 text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">{{ $title }}</h1>
                    <p class="mt-4 text-base leading-7 text-slate-600">{{ $summary }}</p>
                </div>
                @if($slug)
                    <div class="inline-flex items-center rounded-full bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700 ring-1 ring-inset ring-slate-200">
                        {{ $slug }}
                    </div>
                @endif
            </div>

            <div class="mt-8 grid gap-6 md:grid-cols-2">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
                    <h2 class="text-lg font-semibold text-slate-900">Regola applicata</h2>
                    <p class="mt-3 text-sm leading-6 text-slate-600">
                        Questa pagina non viene scelta da Folio tramite include diretti. Il contenuto passa da
                        <code>x-page</code>, dal relativo slug CMS e dal JSON tenant `tests.*.json`.
                    </p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
                    <h2 class="text-lg font-semibold text-slate-900">Fonte di riferimento</h2>
                    @if($sourceUrl)
                        <a href="{{ $sourceUrl }}" class="mt-3 inline-flex items-center gap-2 text-sm font-semibold text-sky-700 hover:text-sky-900">
                            Apri il template sorgente ufficiale
                            <span aria-hidden="true">/</span>
                        </a>
                    @else
                        <p class="mt-3 text-sm leading-6 text-slate-600">Sorgente ufficiale non indicata nel blocco.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
