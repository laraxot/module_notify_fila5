@php
    $breadcrumbs = is_array($page['breadcrumbs'] ?? null) ? $page['breadcrumbs'] : [];
    $featuredTopics = is_array($page['featuredTopics'] ?? null) ? $page['featuredTopics'] : [];
    $topics = is_array($page['topics'] ?? null) ? $page['topics'] : [];
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
                :description="$page['intro']"
            />
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between gap-4">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-emerald-700">In evidenza</p>
                <h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-950">Temi in primo piano</h2>
            </div>
        </div>

        <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($featuredTopics as $topic)
                <article class="group overflow-hidden rounded-[2rem] bg-slate-900 shadow-lg">
                    <div class="relative aspect-[4/5] overflow-hidden">
                        <img
                            src="{{ $topic['image'] }}"
                            alt="{{ $topic['title'] }}"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/20 to-transparent"></div>
                        <div class="absolute inset-x-0 bottom-0 p-6">
                            <h3 class="text-2xl font-semibold text-white">{{ $topic['title'] }}</h3>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-8 pb-16 sm:px-6 lg:px-8" id="argomento">
        <div class="flex items-end justify-between gap-4">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-emerald-700">Esplora</p>
                <h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-950">Esplora per argomento</h2>
            </div>
        </div>

        <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($topics as $topic)
                <article class="rounded-[2rem] border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-0.5 hover:border-emerald-300 hover:shadow-lg">
                    <a href="#" class="inline-flex items-center text-2xl font-semibold text-emerald-700 transition hover:text-emerald-800">
                        {{ $topic['title'] }}
                    </a>
                    <p class="mt-4 text-base leading-7 text-slate-600">{{ $topic['description'] }}</p>
                </article>
            @endforeach
        </div>
    </section>
</main>
