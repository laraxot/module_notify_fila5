<?php

use function Laravel\Folio\{middleware, name};
use Filament\Notifications\Notification;
use Filament\Notifications\Livewire\Notifications;
use Filament\Notifications\Actions\Action;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\VerticalAlignment;
use Livewire\Volt\Component;
use Modules\Tenant\Services\TenantService;

/** @var array $base_middleware */
// Per configurazioni avanzate:
// $middleware = TenantService::config('middleware');
// $base_middleware = Arr::get($middleware, 'base', []);
// @var array
$base_middleware = [];

name('home');
middleware($base_middleware);

new class extends Component
{
};

?>

<x-layouts.app>
    @volt('home')
    <div class="min-h-screen bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100">
        <section class="border-b border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-900/70">
            <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
                <x-agid.breadcrumb :items="[
                    ['label' => 'Home', 'url' => url('/it')],
                    ['label' => 'Segnalazioni e servizi cittadini'],
                ]" />
            </div>
        </section>

        <section class="border-b border-slate-200 bg-gradient-to-br from-[var(--agid-primary-dark)] via-[var(--agid-primary)] to-sky-600 text-white dark:border-slate-800">
            <div class="mx-auto grid max-w-screen-xl gap-10 px-4 py-12 sm:px-6 lg:grid-cols-[minmax(0,1.2fr)_minmax(18rem,0.8fr)] lg:px-8 lg:py-16">
                <div class="space-y-6">
                    <div class="flex flex-wrap gap-3 text-sm font-semibold">
                        <span class="rounded-full bg-white/15 px-3 py-1 ring-1 ring-white/20">Portale civico</span>
                        <span class="rounded-full bg-white/15 px-3 py-1 ring-1 ring-white/20">Monitoraggio territorio</span>
                        <span class="rounded-full bg-emerald-400/15 px-3 py-1 text-emerald-50 ring-1 ring-emerald-200/30">Aggiornamenti in tempo reale</span>
                    </div>

                    <div class="space-y-4">
                        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-sky-100">FixCity</p>
                        <h1 class="max-w-3xl text-4xl font-bold tracking-tight sm:text-5xl">
                            Segnala un problema, segui l'intervento, resta aggiornato sul tuo quartiere.
                        </h1>
                        <p class="max-w-2xl text-lg leading-8 text-sky-50/90">
                            La homepage italiana raccoglie segnalazioni pubbliche, accesso rapido ai servizi digitali e stato degli interventi,
                            con una struttura piu chiara e leggibile per cittadini e operatori.
                        </p>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row">
                        <a href="{{ url('/it/segnalazioni/create') }}" class="inline-flex items-center justify-center rounded-lg bg-white px-5 py-3 text-base font-semibold text-[var(--agid-primary-dark)] shadow-sm transition hover:bg-sky-50 focus:outline-none focus:ring-2 focus:ring-white/70 focus:ring-offset-2 focus:ring-offset-[var(--agid-primary-dark)]">
                            Invia una segnalazione
                        </a>
                        <a href="{{ url('/it/segnalazioni') }}" class="inline-flex items-center justify-center rounded-lg border border-white/30 bg-white/10 px-5 py-3 text-base font-semibold text-white transition hover:bg-white/15 focus:outline-none focus:ring-2 focus:ring-white/70 focus:ring-offset-2 focus:ring-offset-[var(--agid-primary-dark)]">
                            Esplora le segnalazioni aperte
                        </a>
                    </div>
                </div>

                <aside class="rounded-3xl border border-white/15 bg-slate-950/20 p-6 shadow-2xl backdrop-blur-sm">
                    <p class="text-sm font-semibold uppercase tracking-[0.16em] text-sky-100">Perche funziona</p>
                    <div class="mt-4 space-y-4">
                        <div class="rounded-2xl bg-white/10 p-4">
                            <p class="text-sm text-sky-100">Segui il ciclo completo</p>
                            <p class="mt-1 text-xl font-semibold">Dalla presa in carico alla risoluzione</p>
                        </div>
                        <div class="rounded-2xl bg-white/10 p-4">
                            <p class="text-sm text-sky-100">Categorie strutturate</p>
                            <p class="mt-1 text-xl font-semibold">Filtri chiari per strada, rifiuti, illuminazione e decoro</p>
                        </div>
                        <div class="rounded-2xl bg-white/10 p-4">
                            <p class="text-sm text-sky-100">Esperienza mobile-first</p>
                            <p class="mt-1 text-xl font-semibold">Accesso rapido da smartphone durante la segnalazione sul posto</p>
                        </div>
                    </div>
                </aside>
            </div>
        </section>

        <section class="border-b border-slate-200 bg-slate-100/70 dark:border-slate-800 dark:bg-slate-900">
            <div class="mx-auto grid max-w-screen-xl gap-4 px-4 py-6 sm:px-6 md:grid-cols-3 lg:px-8">
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-950/60">
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Presa in carico trasparente</p>
                    <p class="mt-2 text-lg font-semibold">Ogni segnalazione mostra stato e avanzamento.</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-950/60">
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Orientamento immediato</p>
                    <p class="mt-2 text-lg font-semibold">Percorsi rapidi per invio, consultazione e servizi utili.</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-950/60">
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Architettura CMS preservata</p>
                    <p class="mt-2 text-lg font-semibold">I contenuti restano gestibili dai blocchi home del tenant.</p>
                </div>
            </div>
        </section>

        <main class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8 lg:py-12">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-4 lg:gap-8">
                <section class="space-y-6 lg:col-span-3" aria-labelledby="home-content-title">
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                        <div class="mb-6 flex flex-col gap-4 border-b border-slate-200 pb-6 dark:border-slate-800 sm:flex-row sm:items-end sm:justify-between">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[var(--agid-primary)]">Homepage operativa</p>
                                <h2 id="home-content-title" class="mt-2 text-2xl font-bold tracking-tight">Segnalazioni dal territorio</h2>
                                <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-600 dark:text-slate-300">
                                    Elenco aggiornato dei problemi segnalati dai cittadini, con filtri per categoria e vista pronta per consultazione rapida.
                                </p>
                            </div>
                            <a href="{{ url('/it/segnalazioni') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:bg-slate-50 dark:border-slate-700 dark:text-slate-200 dark:hover:bg-slate-800">
                                Vedi archivio completo
                            </a>
                        </div>

                        <x-page side="content" slug="home" />
                    </div>
                </section>

                <aside class="space-y-6 lg:col-span-1" aria-label="Azioni rapide e contenuti di supporto">
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                        <h2 class="text-lg font-semibold">Azioni rapide</h2>
                        <div class="mt-4 space-y-3">
                            <a href="{{ url('/it/segnalazioni/create') }}" class="block rounded-2xl border border-slate-200 px-4 py-3 transition hover:border-[var(--agid-primary)] hover:bg-sky-50 dark:border-slate-800 dark:hover:bg-slate-800">
                                <span class="block text-sm font-medium text-slate-500 dark:text-slate-400">Nuova pratica</span>
                                <span class="mt-1 block font-semibold">Invia una segnalazione geolocalizzata</span>
                            </a>
                            <a href="{{ url('/it/segnalazioni') }}" class="block rounded-2xl border border-slate-200 px-4 py-3 transition hover:border-[var(--agid-primary)] hover:bg-sky-50 dark:border-slate-800 dark:hover:bg-slate-800">
                                <span class="block text-sm font-medium text-slate-500 dark:text-slate-400">Consultazione</span>
                                <span class="mt-1 block font-semibold">Controlla gli interventi gia pubblicati</span>
                            </a>
                            <a href="{{ url('/it/services') }}" class="block rounded-2xl border border-slate-200 px-4 py-3 transition hover:border-[var(--agid-primary)] hover:bg-sky-50 dark:border-slate-800 dark:hover:bg-slate-800">
                                <span class="block text-sm font-medium text-slate-500 dark:text-slate-400">Servizi</span>
                                <span class="mt-1 block font-semibold">Accedi ai servizi comunali digitali</span>
                            </a>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                        <h2 class="text-lg font-semibold">Come usare FixCity</h2>
                        <ol class="mt-4 space-y-4 text-sm leading-6 text-slate-600 dark:text-slate-300">
                            <li class="flex gap-3">
                                <span class="mt-0.5 inline-flex h-6 w-6 flex-none items-center justify-center rounded-full bg-sky-100 text-xs font-bold text-[var(--agid-primary)] dark:bg-sky-900/40">1</span>
                                <span>Descrivi il problema e, se possibile, allega foto e posizione.</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-0.5 inline-flex h-6 w-6 flex-none items-center justify-center rounded-full bg-sky-100 text-xs font-bold text-[var(--agid-primary)] dark:bg-sky-900/40">2</span>
                                <span>Segui lo stato dell'intervento direttamente dalla lista pubblica.</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-0.5 inline-flex h-6 w-6 flex-none items-center justify-center rounded-full bg-sky-100 text-xs font-bold text-[var(--agid-primary)] dark:bg-sky-900/40">3</span>
                                <span>Usa i servizi collegati per approfondire procedure e contatti utili.</span>
                            </li>
                        </ol>
                    </div>

                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                        <x-page side="sidebar" slug="home" />
                    </div>
                </aside>
            </div>
        </main>

        <section class="border-t border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-900/80">
            <div class="mx-auto flex max-w-screen-xl flex-col gap-4 px-4 py-8 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[var(--agid-primary)]">Supporto ai cittadini</p>
                    <h2 class="mt-2 text-2xl font-bold">Serve assistenza per inviare o seguire una segnalazione?</h2>
                    <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-600 dark:text-slate-300">
                        Contatta il Comune o consulta i servizi digitali disponibili per completare la procedura correttamente.
                    </p>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row">
                    <a href="{{ url('/it/services') }}" class="inline-flex items-center justify-center rounded-lg bg-[var(--agid-primary)] px-5 py-3 text-sm font-semibold text-white transition hover:brightness-110">
                        Vai ai servizi
                    </a>
                    <a href="{{ url('/it/administration') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50 dark:border-slate-700 dark:text-slate-200 dark:hover:bg-slate-800">
                        Contatti e uffici
                    </a>
                </div>
            </div>
        </section>
    </div>
    @endvolt
</x-layouts.app>
