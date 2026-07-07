@php
$steps = $steps ?? [
    ['title' => 'Dati del richiedente', 'description' => 'Confermati'],
    ['title' => 'Scelta appuntamento', 'description' => 'Completata'],
    ['title' => 'Verifica finale', 'description' => 'Inviata'],
];

$details = $details ?? [
    'Servizio' => 'Richiesta carta d\'identita elettronica',
    'Sede' => 'Municipio, sportello servizi demografici',
    'Data' => 'Mercoledi 17 aprile 2026',
    'Ora' => '10:30',
    'Codice prenotazione' => 'FC-AP-2026-0417',
];
@endphp

<section class="bg-white">
    <div class="mx-auto max-w-5xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <div class="rounded-[2rem] border border-emerald-200 bg-emerald-50 p-8 shadow-sm">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.22em] text-emerald-700">Design Comuni / Test</p>
                    <h1 class="mt-3 text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">Appuntamento confermato</h1>
                    <p class="mt-4 text-base leading-7 text-slate-700">
                        La prenotazione e stata registrata. Questa pagina viene pubblicata tramite slug CMS
                        <code>tests.appuntamento-06-conferma</code> e blocchi tenant JSON, in coerenza con il pattern del progetto.
                    </p>
                </div>
                <div class="inline-flex items-center rounded-full bg-white px-4 py-2 text-sm font-semibold text-emerald-700 ring-1 ring-inset ring-emerald-200">
                    Operazione completata
                </div>
            </div>

            <div class="mt-8 grid gap-3 sm:grid-cols-3">
                @foreach($steps as $index => $step)
                    <div class="rounded-2xl bg-white p-4 ring-1 ring-inset ring-emerald-100">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-emerald-600 text-sm font-semibold text-white">{{ $index + 1 }}</span>
                            <div>
                                <p class="text-sm font-semibold text-slate-900">{{ $step['title'] }}</p>
                                <p class="text-xs text-slate-500">{{ $step['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-10 grid gap-6 lg:grid-cols-[1.4fr_0.9fr]">
            <div class="rounded-[2rem] border border-slate-200 bg-slate-50 p-8">
                <h2 class="text-xl font-semibold text-slate-900">Riepilogo dell'appuntamento</h2>
                <dl class="mt-6 space-y-4">
                    @foreach($details as $label => $value)
                        <div class="grid gap-1 border-b border-slate-200 pb-4 sm:grid-cols-[180px_1fr] sm:gap-4">
                            <dt class="text-sm font-medium text-slate-500">{{ $label }}</dt>
                            <dd class="text-sm font-semibold text-slate-900">{{ $value }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>

            <aside class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Prossimi passi</h2>
                <ul class="mt-5 space-y-4 text-sm leading-6 text-slate-600">
                    <li>Porta con te il documento richiesto e la conferma della prenotazione.</li>
                    <li>Presentati con qualche minuto di anticipo rispetto all'orario indicato.</li>
                    <li>Se non puoi venire, annulla o riprogramma l'appuntamento dai servizi online.</li>
                </ul>
                <div class="mt-8 flex flex-col gap-3">
                    <a href="#" class="inline-flex items-center justify-center rounded-full bg-sky-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-sky-800">Scarica ricevuta</a>
                    <a href="#" class="inline-flex items-center justify-center rounded-full border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:bg-slate-50">Torna ai servizi</a>
                </div>
            </aside>
        </div>
    </div>
</section>
