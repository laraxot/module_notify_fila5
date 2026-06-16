@php
    $breadcrumbs = is_array($page['breadcrumbs'] ?? null) ? $page['breadcrumbs'] : [];
    $items = is_array($page['index'] ?? null) ? $page['index'] : [];
    $requirements = is_array($page['requirements'] ?? null) ? $page['requirements'] : [];
    $calendarLinks = is_array($page['calendarLinks'] ?? null) ? $page['calendarLinks'] : [];
    $office = is_array($page['office'] ?? null) ? $page['office'] : [];
    $crumbItems = collect($breadcrumbs)
        ->map(function (array $crumb): array {
            $item = ['text' => $crumb['label']];
            if (isset($crumb['url']) && is_string($crumb['url'])) {
                $item['href'] = $crumb['url'];
            }

            return $item;
        })
        ->values()
        ->all();
@endphp

<main class="bg-slate-50" id="main-container">
    <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <x-pub_theme::layout.sections.breadcrumbs :crumbs="$crumbItems" />

        <div class="mt-6">
            <x-pub_theme::design-comuni.page-hero
                :eyebrow="$page['eyebrow']"
                :title="$page['title']"
                :description="sprintf('L\'appuntamento e fissato per %s. Abbiamo inviato il riepilogo all\'email %s.', $page['appointment'], $page['email'])"
                icon="heroicon-o-check-circle"
                tone="success"
            />
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl gap-8 px-4 pb-16 sm:px-6 lg:grid-cols-[18rem_minmax(0,1fr)] lg:px-8">
        <div class="hidden lg:block">
            <x-pub_theme::design-comuni.page-index :items="$items" />
        </div>

        <div class="space-y-8">
            <section id="needed" class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-slate-500">Preparazione</p>
                <h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-950">Cosa serve</h2>
                <ul class="mt-6 space-y-3">
                    @foreach ($requirements as $requirement)
                        <li class="flex items-start gap-3 rounded-2xl bg-slate-50 px-4 py-4 text-slate-700">
                            <x-filament::icon name="heroicon-o-document-text" class="mt-0.5 h-5 w-5 text-emerald-700" />
                            <span>{{ $requirement }}</span>
                        </li>
                    @endforeach
                </ul>
            </section>

            <section id="address" class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-slate-500">Luogo</p>
                <h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-950">Indirizzo</h2>

                <article class="mt-6 rounded-[1.5rem] border border-emerald-100 bg-emerald-50/70 p-6">
                    <h3 class="text-xl font-semibold text-slate-950">{{ $office['name'] ?? '' }}</h3>
                    <p class="mt-3 text-base leading-7 text-slate-700">{{ $office['address'] ?? '' }}</p>
                    <p class="mt-2 text-base font-medium text-emerald-700">{{ $office['email'] ?? '' }}</p>
                </article>
            </section>

            <section id="calendar" class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-slate-500">Promemoria</p>
                <h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-950">Aggiungi al tuo calendario</h2>

                <div class="mt-6 grid gap-4 sm:grid-cols-3">
                    @foreach ($calendarLinks as $calendarLink)
                        <a
                            href="{{ $calendarLink['url'] }}"
                            class="inline-flex items-center justify-between rounded-[1.5rem] border border-slate-200 bg-slate-50 px-5 py-4 font-medium text-slate-800 transition hover:border-emerald-300 hover:bg-white hover:text-emerald-700"
                        >
                            <span>{{ $calendarLink['label'] }}</span>
                            <x-filament::icon name="heroicon-o-arrow-top-right-on-square" class="h-5 w-5" />
                        </a>
                    @endforeach
                </div>
            </section>
        </div>
    </section>
</main>
