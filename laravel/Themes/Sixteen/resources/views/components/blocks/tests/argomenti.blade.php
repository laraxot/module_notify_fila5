@php
$items = $items ?? [
    [
        'title' => 'Anagrafe e stato civile',
        'description' => 'Carta d\'identita, certificati, residenza e documenti personali.',
        'href' => '#',
    ],
    [
        'title' => 'Ambiente',
        'description' => 'Rifiuti, raccolta differenziata, verde pubblico e sostenibilita.',
        'href' => '#',
    ],
    [
        'title' => 'Mobilita e trasporti',
        'description' => 'Parcheggi, viabilita, ZTL, trasporto pubblico e percorsi urbani.',
        'href' => '#',
    ],
    [
        'title' => 'Tributi',
        'description' => 'IMU, TARI, canoni e pagamenti verso il Comune.',
        'href' => '#',
    ],
    [
        'title' => 'Scuola e servizi educativi',
        'description' => 'Mensa, trasporto scolastico, nidi e sostegni per le famiglie.',
        'href' => '#',
    ],
    [
        'title' => 'Segnalazioni e cura del territorio',
        'description' => 'Problemi urbani, manutenzioni e monitoraggio degli interventi.',
        'href' => '#',
    ],
];
@endphp

<section class="bg-slate-50">
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-sky-700">Design Comuni / Test</p>
            <h1 class="mt-3 text-4xl font-semibold tracking-tight text-slate-900 sm:text-5xl">Argomenti</h1>
            <p class="mt-4 text-base leading-7 text-slate-600 sm:text-lg">
                Esplora i contenuti del Comune per area tematica. La pagina e resa tramite <code>x-page</code>
                e i blocchi CMS salvati nel tenant, non tramite include diretti della route Folio.
            </p>
        </div>

        <div class="mt-10 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @foreach($items as $item)
                <article class="flex h-full flex-col rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                    <div class="flex items-start justify-between gap-4">
                        <h2 class="text-xl font-semibold text-slate-900">{{ $item['title'] }}</h2>
                        <span class="mt-1 inline-flex h-10 w-10 items-center justify-center rounded-full bg-sky-100 text-sky-700">
                            <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5" aria-hidden="true">
                                <path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                    <p class="mt-4 flex-1 text-sm leading-6 text-slate-600">{{ $item['description'] }}</p>
                    <a href="{{ $item['href'] }}" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-sky-700 hover:text-sky-900">
                        Vai all'argomento
                        <span aria-hidden="true">/</span>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>
