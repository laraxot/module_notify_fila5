@php
    $topics = [
        ['title' => 'Ambiente', 'description' => 'Rifiuti, verde pubblico, aria, acqua e segnalazioni ambientali.', 'count' => 18, 'href' => '#'],
        ['title' => 'Anagrafe e stato civile', 'description' => 'Carta d\'identita, certificati, residenza, nascite e matrimoni.', 'count' => 24, 'href' => '#'],
        ['title' => 'Appuntamenti', 'description' => 'Prenotazioni con uffici, sportelli e servizi a sportello.', 'count' => 9, 'href' => url('/it/tests/appuntamento-06-conferma')],
        ['title' => 'Mobilita', 'description' => 'Viabilita, parcheggi, trasporto pubblico e ZTL.', 'count' => 14, 'href' => '#'],
        ['title' => 'Scuola e formazione', 'description' => 'Iscrizioni, mensa, trasporto scolastico e servizi educativi.', 'count' => 11, 'href' => '#'],
        ['title' => 'Tributi', 'description' => 'IMU, TARI, pagamenti, agevolazioni e scadenze.', 'count' => 16, 'href' => '#'],
        ['title' => 'Urbanistica', 'description' => 'SUAP, edilizia privata, permessi e documentazione tecnica.', 'count' => 13, 'href' => '#'],
        ['title' => 'Vita amministrativa', 'description' => 'Organi politici, uffici, delibere, bandi e trasparenza.', 'count' => 21, 'href' => '#'],
    ];

    $featured = array_slice($topics, 0, 4);
@endphp

<x-pub_theme::design-comuni.page-shell
    title="Argomenti"
    summary="Una ricostruzione locale del pattern Design Comuni: tassonomia chiara, card leggibili e gerarchia compatibile con Sixteen, senza dipendere dal bundle statico originale."
    :breadcrumb-items="[
        ['title' => 'Test', 'url' => url('/it/tests')],
    ]"
>
    <div class="grid gap-8 lg:grid-cols-[minmax(0,1fr)_20rem]">
        <div class="space-y-8">
            <section class="grid gap-4 md:grid-cols-2">
                @foreach($featured as $topic)
                    <a href="{{ $topic['href'] }}" class="group rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-sky-200 hover:shadow-lg">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-sky-700">Argomento</p>
                                <h2 class="mt-3 text-2xl font-bold text-slate-900 group-hover:text-sky-700">{{ $topic['title'] }}</h2>
                            </div>
                            <span class="rounded-full bg-sky-50 px-3 py-1 text-sm font-semibold text-sky-700">{{ $topic['count'] }}</span>
                        </div>
                        <p class="mt-4 text-base leading-7 text-slate-600">{{ $topic['description'] }}</p>
                        <div class="mt-6 flex items-center text-sm font-semibold text-slate-900">
                            Esplora contenuti
                            <span class="ml-2 transition group-hover:translate-x-1">-></span>
                        </div>
                    </a>
                @endforeach
            </section>

            <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm lg:p-8">
                <div class="flex flex-col gap-4 border-b border-slate-200 pb-6 md:flex-row md:items-end md:justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-sky-700">Catalogo completo</p>
                        <h2 class="mt-2 text-3xl font-black tracking-tight text-slate-900">Tutti gli argomenti</h2>
                    </div>
                    <label class="block w-full md:max-w-sm">
                        <span class="sr-only">Cerca tra gli argomenti</span>
                        <input type="search" placeholder="Cerca un argomento" class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 focus:border-sky-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-sky-100">
                    </label>
                </div>

                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    @foreach($topics as $topic)
                        <a href="{{ $topic['href'] }}" class="rounded-2xl border border-slate-200 px-5 py-5 transition hover:border-sky-200 hover:bg-sky-50/40">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="text-xl font-bold text-slate-900">{{ $topic['title'] }}</h3>
                                    <p class="mt-2 text-sm leading-6 text-slate-600">{{ $topic['description'] }}</p>
                                </div>
                                <span class="rounded-full border border-slate-200 px-3 py-1 text-xs font-semibold text-slate-600">{{ $topic['count'] }} contenuti</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        </div>

        <aside class="space-y-6">
            <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-sky-700">In evidenza</p>
                <h2 class="mt-2 text-2xl font-black tracking-tight text-slate-900">Percorsi rapidi</h2>
                <div class="mt-6 space-y-3">
                    <a href="{{ url('/it/tests/appuntamento-06-conferma') }}" class="block rounded-2xl bg-sky-600 px-4 py-4 text-sm font-semibold text-white transition hover:bg-sky-700">Apri il flusso di conferma appuntamento</a>
                    <a href="{{ url('/it/tests') }}" class="block rounded-2xl border border-slate-200 px-4 py-4 text-sm font-semibold text-slate-700 transition hover:border-slate-300 hover:bg-slate-50">Vai al catalogo completo dei test</a>
                </div>
            </section>

            <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-sky-700">Blocchi riconosciuti</p>
                <ul class="mt-4 space-y-3 text-sm leading-6 text-slate-600">
                    <li>Header istituzionale semplificato del tema.</li>
                    <li>Breadcrumb locale con namespace <code>pub_theme</code>.</li>
                    <li>Hero editoriale con tono AGID e spacing Sixteen.</li>
                    <li>Card riusabili per tassonomie e navigazione rapida.</li>
                </ul>
            </section>
        </aside>
    </div>
</x-pub_theme::design-comuni.page-shell>
