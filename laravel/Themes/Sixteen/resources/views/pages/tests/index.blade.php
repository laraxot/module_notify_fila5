<?php

declare(strict_types=1);

/** @var array<string, array<string, mixed>> $registry */
$registry = require base_path('Themes/Sixteen/resources/data/design-comuni-pages.php');
?>

<x-pub_theme::layouts.app>
    <main class="bg-slate-50">
        <section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-emerald-700">Design Comuni</p>
                <h1 class="mt-3 text-4xl font-bold tracking-tight text-slate-900">Catalogo pagine test</h1>
                <p class="mt-4 text-lg text-slate-600">
                    Replica progressiva dei template ufficiali dentro il tema Sixteen usando Vite, Tailwind e blocchi Blade riusabili.
                </p>
            </div>

            <div class="mt-10 grid gap-4 md:grid-cols-2">
                @foreach ($registry as $pageSlug => $page)
                    <a
                        href="{{ url(app()->getLocale().'/tests/'.$pageSlug) }}"
                        class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:border-emerald-300 hover:shadow-lg"
                    >
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">
                            {{ strtoupper((string) ($page['group'] ?? 'sito')) }}
                        </p>
                        <h2 class="mt-3 text-2xl font-semibold text-slate-900">{{ $page['title'] }}</h2>
                        <p class="mt-2 text-sm text-slate-600">{{ $page['description'] }}</p>
                        <p class="mt-4 text-sm font-medium text-emerald-700">Apri la pagina</p>
                    </a>
                @endforeach
            </div>
        </section>
    </main>
</x-pub_theme::layouts.app>
