<footer class="border-t border-slate-200 bg-[var(--agid-primary-dark)] text-white dark:border-slate-800" role="contentinfo">
    <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[1.2fr_0.9fr_0.9fr_1fr]">
            <section class="space-y-4">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-sky-100">{{ config('app.name', 'FixCity') }}</p>
                <h2 class="text-2xl font-bold">Piattaforma civica per segnalazioni e servizi digitali.</h2>
                <p class="max-w-md text-sm leading-7 text-slate-200">
                    Supporta cittadini e operatori nella gestione dei problemi sul territorio, con consultazione pubblica,
                    aggiornamenti sullo stato degli interventi e accesso rapido ai servizi comunali.
                </p>
                <div class="flex flex-wrap gap-3 text-sm text-slate-200">
                    <span class="rounded-full bg-white/10 px-3 py-1 ring-1 ring-white/15">Accessibilita</span>
                    <span class="rounded-full bg-white/10 px-3 py-1 ring-1 ring-white/15">Monitoraggio civico</span>
                    <span class="rounded-full bg-white/10 px-3 py-1 ring-1 ring-white/15">Servizi online</span>
                </div>
            </section>

            <nav aria-label="Esplora il portale" class="space-y-4">
                <h3 class="text-sm font-semibold uppercase tracking-[0.16em] text-sky-100">Esplora</h3>
                <ul class="space-y-3 text-sm text-slate-200">
                    <li><a class="transition hover:text-white hover:underline" href="{{ url('/it') }}">Homepage</a></li>
                    <li><a class="transition hover:text-white hover:underline" href="{{ url('/it/segnalazioni') }}">Segnalazioni</a></li>
                    <li><a class="transition hover:text-white hover:underline" href="{{ url('/it/segnalazioni/create') }}">Nuova segnalazione</a></li>
                    <li><a class="transition hover:text-white hover:underline" href="{{ url('/it/services') }}">Servizi</a></li>
                    <li><a class="transition hover:text-white hover:underline" href="{{ url('/it/administration') }}">Amministrazione</a></li>
                </ul>
            </nav>

            <nav aria-label="Assistenza e trasparenza" class="space-y-4">
                <h3 class="text-sm font-semibold uppercase tracking-[0.16em] text-sky-100">Informazioni</h3>
                <ul class="space-y-3 text-sm text-slate-200">
                    <li><a class="transition hover:text-white hover:underline" href="{{ url('/it/faq') }}">FAQ</a></li>
                    <li><a class="transition hover:text-white hover:underline" href="{{ url('/it/privacy') }}">Privacy</a></li>
                    <li><a class="transition hover:text-white hover:underline" href="{{ url('/it/accessibilita') }}">Accessibilita</a></li>
                    <li><a class="transition hover:text-white hover:underline" href="{{ url('/it/note-legali') }}">Note legali</a></li>
                    <li><a class="transition hover:text-white hover:underline" href="{{ url('/it/sitemap') }}">Mappa del sito</a></li>
                </ul>
            </nav>

            <section class="space-y-4">
                <h3 class="text-sm font-semibold uppercase tracking-[0.16em] text-sky-100">Contatti</h3>
                <div class="space-y-3 text-sm leading-7 text-slate-200">
                    <p>
                        <span class="font-semibold text-white">Comune digitale</span><br>
                        Sportello online per i cittadini<br>
                        Servizi disponibili 24/7
                    </p>
                    <p>
                        <a class="transition hover:text-white hover:underline" href="mailto:info@fixcity.local">info@fixcity.local</a><br>
                        <a class="transition hover:text-white hover:underline" href="tel:+390000000000">+39 000 000 0000</a>
                    </p>
                    <p class="text-xs text-slate-300">
                        Se un link non e ancora attivo, il footer mantiene comunque una struttura istituzionale completa e pronta a essere collegata ai contenuti definitivi.
                    </p>
                </div>
            </section>
        </div>

        <div class="mt-10 flex flex-col gap-4 border-t border-white/10 pt-6 text-sm text-slate-300 md:flex-row md:items-center md:justify-between">
            <p>© {{ date('Y') }} {{ config('app.name', 'FixCity') }}. Tutti i diritti riservati.</p>
            <div class="flex flex-wrap gap-4">
                <a class="transition hover:text-white hover:underline" href="{{ url('/it/privacy') }}">Privacy</a>
                <a class="transition hover:text-white hover:underline" href="{{ url('/it/accessibilita') }}">Accessibilita</a>
                <a class="transition hover:text-white hover:underline" href="{{ url('/it/sitemap') }}">Sitemap</a>
            </div>
        </div>
    </div>
</footer>
