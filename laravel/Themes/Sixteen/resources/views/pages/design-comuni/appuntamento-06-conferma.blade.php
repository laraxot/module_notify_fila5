@php
    $steps = [
        ['title' => 'Ufficio'],
        ['title' => 'Data e orario'],
        ['title' => 'Dettagli'],
        ['title' => 'Richiedente'],
        ['title' => 'Riepilogo'],
        ['title' => 'Conferma'],
    ];

    $appointment = [
        'service' => 'Prenotazione carta d\'identita elettronica',
        'office' => 'Ufficio Anagrafe - Palazzo Comunale',
        'address' => 'Piazza Municipio 1, FixCity',
        'date' => '15 aprile 2026',
        'time' => '10:30 - 11:00',
        'code' => 'FXC-APR-260415-1030',
        'email' => 'mario.rossi@example.test',
        'holder' => 'Mario Rossi',
    ];
@endphp

<x-pub_theme::design-comuni.page-shell
    title="Appuntamento confermato"
    summary="Versione locale del pattern finale di prenotazione: stepper, messaggio di esito, riepilogo e azioni successive costruiti con componenti e classi del tema Sixteen."
    :breadcrumb-items="[
        ['title' => 'Test', 'url' => url('/it/tests')],
        ['title' => 'Prenotazione appuntamento', 'url' => '#'],
    ]"
    :steps="$steps"
    :current-step="6"
>
    <div class="grid gap-8 lg:grid-cols-[minmax(0,1fr)_22rem]">
        <div class="space-y-8">
            <section class="rounded-[2rem] border border-emerald-200 bg-white p-8 shadow-sm">
                <div class="flex flex-col gap-6 md:flex-row md:items-start md:justify-between">
                    <div class="flex gap-5">
                        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-700">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="h-8 w-8" aria-hidden="true"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.18em] text-emerald-700">Esito positivo</p>
                            <h2 class="mt-2 text-3xl font-black tracking-tight text-slate-900">La prenotazione e stata registrata con successo</h2>
                            <p class="mt-4 max-w-2xl text-base leading-7 text-slate-600">Porta con te il codice di conferma e un documento valido. Riceverai anche una email con i dettagli dell'appuntamento.</p>
                        </div>
                    </div>
                    <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-left md:min-w-64">
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-emerald-700">Codice conferma</p>
                        <p class="mt-2 text-xl font-black tracking-wide text-emerald-900">{{ $appointment['code'] }}</p>
                    </div>
                </div>
            </section>

            <section class="grid gap-4 md:grid-cols-2">
                <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-sky-700">Servizio</p>
                    <h3 class="mt-3 text-2xl font-bold text-slate-900">{{ $appointment['service'] }}</h3>
                    <dl class="mt-6 space-y-4 text-sm text-slate-600">
                        <div>
                            <dt class="font-semibold text-slate-900">Ufficio</dt>
                            <dd class="mt-1">{{ $appointment['office'] }}</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-slate-900">Indirizzo</dt>
                            <dd class="mt-1">{{ $appointment['address'] }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-sky-700">Quando</p>
                    <h3 class="mt-3 text-2xl font-bold text-slate-900">{{ $appointment['date'] }}</h3>
                    <dl class="mt-6 space-y-4 text-sm text-slate-600">
                        <div>
                            <dt class="font-semibold text-slate-900">Fascia oraria</dt>
                            <dd class="mt-1">{{ $appointment['time'] }}</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-slate-900">Intestatario</dt>
                            <dd class="mt-1">{{ $appointment['holder'] }}</dd>
                        </div>
                    </dl>
                </div>
            </section>

            <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm lg:p-8">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-sky-700">Prossimi passi</p>
                        <h3 class="mt-2 text-3xl font-black tracking-tight text-slate-900">Cosa succede adesso</h3>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-600">
                        Notifica inviata a <span class="font-semibold text-slate-900">{{ $appointment['email'] }}</span>
                    </div>
                </div>
                <div class="mt-8 grid gap-4 md:grid-cols-3">
                    <div class="rounded-2xl border border-slate-200 p-5">
                        <p class="text-sm font-semibold text-slate-900">1. Controlla la conferma</p>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Verifica la mail ricevuta e salva il codice dell'appuntamento.</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 p-5">
                        <p class="text-sm font-semibold text-slate-900">2. Prepara i documenti</p>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Porta il documento richiesto e l'eventuale modulistica collegata al servizio.</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 p-5">
                        <p class="text-sm font-semibold text-slate-900">3. Presentati in orario</p>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Arriva qualche minuto prima per semplificare l'accettazione allo sportello.</p>
                    </div>
                </div>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ url('/it/tests') }}" class="rounded-2xl bg-sky-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-sky-700">Torna al catalogo test</a>
                    <a href="{{ url('/it/tests/argomenti') }}" class="rounded-2xl border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-300 hover:bg-slate-50">Esplora altri pattern</a>
                </div>
            </section>
        </div>

        <aside class="space-y-6">
            <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-sky-700">Pattern riusati</p>
                <ul class="mt-4 space-y-3 text-sm leading-6 text-slate-600">
                    <li>Stepper locale del tema per i sei passaggi.</li>
                    <li>Card riepilogo coerenti con la UI gia presente in Sixteen.</li>
                    <li>Messaggio di successo senza dipendenze Bootstrap Italia runtime.</li>
                </ul>
            </section>

            <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-sky-700">Fidelity target</p>
                <p class="mt-4 text-sm leading-6 text-slate-600">Il focus qui e replicare struttura informativa, gerarchia visiva e affordance del template Design Comuni usando il linguaggio locale del tema, non includere il bundle statico originale.</p>
            </section>
        </aside>
    </div>
</x-pub_theme::design-comuni.page-shell>
