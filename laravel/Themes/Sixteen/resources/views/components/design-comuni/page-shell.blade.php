@props([
    'title',
    'summary' => null,
    'breadcrumbItems' => [],
    'currentPage' => null,
    'steps' => [],
    'currentStep' => null,
])

<x-pub_theme::layouts.app>
    <div class="min-h-screen bg-slate-50 text-slate-900">
        <div class="border-b text-white" style="background: linear-gradient(135deg, var(--agid-primary-dark) 0%, var(--agid-primary) 100%);">
            <div class="mx-auto flex max-w-screen-xl items-center justify-between px-4 py-2 text-xs sm:px-6 lg:px-8">
                <span class="font-medium tracking-wide opacity-90">Comune digitale</span>
                <div class="flex items-center gap-4 opacity-90">
                    <a href="{{ url('/it/tests') }}" class="hover:opacity-100">Catalogo test</a>
                    <a href="{{ url('/it') }}" class="hover:opacity-100">Sito locale</a>
                </div>
            </div>
        </div>

        <div class="border-b text-white" style="background-color: var(--agid-primary-light); border-color: rgba(255,255,255,0.15);">
            <div class="mx-auto flex max-w-screen-xl flex-wrap items-center gap-3 px-4 py-3 text-sm sm:px-6 lg:px-8">
                <a href="{{ url('/it/tests/argomenti') }}" class="rounded-full bg-white/10 px-4 py-2 font-medium transition hover:bg-white/20">Argomenti</a>
                <a href="{{ url('/it/tests/appuntamento-06-conferma') }}" class="rounded-full bg-white/10 px-4 py-2 font-medium transition hover:bg-white/20">Appuntamento conferma</a>
                <a href="{{ url('/it/tests') }}" class="rounded-full bg-white/10 px-4 py-2 font-medium transition hover:bg-white/20">Tutte le pagine</a>
            </div>
        </div>

        <x-pub_theme::blocks.navigation.breadcrumb
            :items="$breadcrumbItems"
            :current-page="$currentPage ?? $title"
            :home-url="url('/it')"
        />

        <main>
            <section class="border-b border-slate-200 bg-white">
                <div class="mx-auto max-w-screen-xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
                    <div class="max-w-4xl">
                        <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-sky-700">Design Comuni in Tailwind/Vite</p>
                        <h1 class="text-4xl font-black tracking-tight text-slate-900 sm:text-5xl">{{ $title }}</h1>
                        @if($summary)
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-slate-600">{{ $summary }}</p>
                        @endif
                    </div>

                    @if($currentStep !== null && count($steps) > 0)
                        <div class="mt-10 rounded-3xl border border-slate-200 bg-slate-50 p-6">
                            <x-pub_theme::utilities.stepper
                                :steps="$steps"
                                :current-step="$currentStep"
                                variant="horizontal"
                                size="md"
                                theme="primary"
                            />
                        </div>
                    @endif
                </div>
            </section>

            <section class="mx-auto max-w-screen-xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
                {{ $slot }}
            </section>
        </main>

    </div>
</x-pub_theme::layouts.app>
