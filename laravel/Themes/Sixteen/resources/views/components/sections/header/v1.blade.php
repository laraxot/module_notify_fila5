@php
    /** @var iterable<int, object>|null $blocks */
    $nav1Block = collect($blocks ?? [])->first(static fn ($item): bool => ($item->slug ?? null) === 'nav1');
    $primaryItems = is_array($nav1Block?->data['items'] ?? null)
        ? $nav1Block->data['items']
        : [
            ['label' => 'Amministrazione', 'url' => '#'],
            ['label' => 'Novità', 'url' => '#'],
            ['label' => 'Servizi', 'url' => '#'],
            ['label' => 'Vivere il Comune', 'url' => '#'],
        ];
    $secondaryItems = [
        ['label' => 'Iscrizioni', 'url' => '#'],
        ['label' => 'Estate in città', 'url' => '#'],
        ['label' => 'Polizia locale', 'url' => '#'],
        ['label' => 'Tutti gli argomenti', 'url' => '/it/tests/argomenti', 'highlight' => true],
    ];
    $socials = [
        ['label' => 'Twitter', 'url' => '#', 'icon' => 'twitter'],
        ['label' => 'Facebook', 'url' => '#', 'icon' => 'facebook'],
        ['label' => 'YouTube', 'url' => '#', 'icon' => 'youtube'],
        ['label' => 'Telegram', 'url' => '#', 'icon' => 'telegram'],
        ['label' => 'Whatsapp', 'url' => '#', 'icon' => 'whatsapp'],
        ['label' => 'RSS', 'url' => '#', 'icon' => 'rss'],
    ];
    $siteTitle = (string) ($_theme->metatag('title') ?: 'Il mio Comune');
    $siteSubtitle = (string) ($_theme->metatag('subtitle') ?: 'Un comune da vivere');
@endphp

<header class="text-white shadow-sm" role="banner">
    <div class="border-b border-white/15 bg-[var(--agid-primary-dark)]">
        <div class="mx-auto flex h-10 w-full max-w-screen-xl items-center justify-between px-4 sm:px-6 lg:px-8">
            <a
                class="hidden text-xs font-medium tracking-wide text-white/95 transition hover:text-white lg:inline-block"
                href="#"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Vai al portale della Regione - apertura nuova scheda"
                title="Vai al portale della Regione"
            >
                Nome della Regione
            </a>

            <div class="ml-auto flex items-center gap-2 sm:gap-3" role="navigation" aria-label="Utility header">
                <button
                    type="button"
                    class="inline-flex items-center gap-1 rounded-full border border-white/20 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.2em] text-white transition hover:border-white/35 hover:bg-white/10"
                    aria-label="Lingua attiva ITA"
                >
                    <span>ITA</span>
                    <svg class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 10.94l3.71-3.71a.75.75 0 1 1 1.06 1.06l-4.24 4.25a.75.75 0 0 1-1.06 0L5.21 8.29a.75.75 0 0 1 .02-1.08Z" clip-rule="evenodd"/>
                    </svg>
                </button>

                @guest
                    <a
                        class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 text-xs font-semibold text-[var(--agid-primary)] transition hover:bg-white/90 sm:px-4 sm:text-sm"
                        href="{{ route('login') }}"
                        aria-label="Accedi all'area personale"
                    >
                        <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-[var(--agid-primary)]/10 text-[var(--agid-primary)]">
                            <x-heroicon-o-user class="h-4 w-4" aria-hidden="true" />
                        </span>
                        <span class="hidden lg:inline">Accedi all'area personale</span>
                    </a>
                @endguest

                @auth
                    <div class="relative">
                        <button
                            id="dropdownDefaultButton"
                            class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 text-xs font-semibold text-[var(--agid-primary)] transition hover:bg-white/90 sm:px-4 sm:text-sm"
                            type="button"
                            aria-expanded="false"
                            aria-haspopup="true"
                            aria-label="Menu utente - {{ Auth::user()->name }}"
                        >
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-[var(--agid-primary)]/10 text-[var(--agid-primary)]">
                                <x-heroicon-o-user class="h-4 w-4" aria-hidden="true" />
                            </span>
                            <span class="hidden lg:inline">{{ Auth::user()->name }}</span>
                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 10.94l3.71-3.71a.75.75 0 1 1 1.06 1.06l-4.24 4.25a.75.75 0 0 1-1.06 0L5.21 8.29a.75.75 0 0 1 .02-1.08Z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <div id="dropdown" class="absolute right-0 z-50 hidden mt-2 w-48 rounded-lg border border-slate-200 bg-white text-slate-800 shadow-lg" role="menu" aria-orientation="vertical" aria-labelledby="dropdownDefaultButton">
                            <div class="py-2">
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-slate-50" role="menuitem">I miei servizi</a>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-slate-50" role="menuitem">Le mie pratiche</a>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-slate-50" role="menuitem">Notifiche</a>
                                <hr class="my-2 border-slate-200" role="separator" aria-orientation="horizontal">
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-slate-50" role="menuitem">Impostazioni</a>
                                <form method="POST" action="{{ route('logout') }}" class="block">@csrf
                                    <button type="submit" class="flex w-full items-center gap-2 px-4 py-2 text-left text-sm font-semibold hover:bg-slate-50" role="menuitem" aria-label="Esci dall'area personale">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                        </svg>
                                        <span>Esci</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <div class="border-b border-white/15 bg-[var(--agid-primary)]">
        <div class="mx-auto flex w-full max-w-screen-xl items-center justify-between gap-6 px-4 py-4 sm:px-6 lg:px-8 lg:py-5">
            <a href="/" class="flex min-w-0 items-center gap-4 transition hover:opacity-95" aria-label="{{ $siteTitle }} - Vai alla homepage">
                <x-filament-panels::logo class="h-14 w-14 shrink-0 sm:h-20 sm:w-20" alt="{{ $siteTitle }}" />
                <div class="min-w-0 text-start">
                    <p class="truncate text-2xl font-bold leading-none sm:text-[1.9rem]">{{ $siteTitle }}</p>
                    <p class="mt-1 hidden text-sm text-white/90 md:block">{{ $siteSubtitle }}</p>
                </div>
            </a>

            <div class="hidden items-center gap-6 lg:flex">
                <div class="flex items-center gap-3">
                    <span class="text-sm font-medium text-white/90">Seguici su</span>
                    <ul class="flex items-center gap-2">
                        @foreach ($socials as $social)
                            <li>
                                <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-white/10 bg-white/5 transition hover:bg-white/12" aria-label="Seguici su {{ $social['label'] }} - apertura nuova scheda">
                                    @if ($social['icon'] === 'twitter')
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.643 4.937a9.548 9.548 0 0 1-2.828.775 4.958 4.958 0 0 0 2.165-2.724 9.85 9.85 0 0 1-3.127 1.195 4.916 4.916 0 0 0-8.38 4.482A13.944 13.944 0 0 1 1.671 3.15a4.917 4.917 0 0 0 1.523 6.562 4.897 4.897 0 0 1-2.229-.616v.06a4.923 4.923 0 0 0 3.946 4.827 4.902 4.902 0 0 1-2.224.084 4.93 4.93 0 0 0 4.604 3.417A9.867 9.867 0 0 1 .964 19.54 13.905 13.905 0 0 0 8.548 21.76c9.056 0 14.01-7.503 14.01-14.01 0-.213-.005-.425-.014-.636a10.004 10.004 0 0 0 2.457-2.548Z"/></svg>
                                    @elseif ($social['icon'] === 'facebook')
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.5 22v-8h2.7l.4-3h-3.1V9.1c0-.9.3-1.5 1.6-1.5H16.7V5c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3V11H7.3v3H10V22h3.5Z"/></svg>
                                    @elseif ($social['icon'] === 'youtube')
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.6 3.5 12 3.5 12 3.5s-7.6 0-9.4.6A3 3 0 0 0 .5 6.2 31.4 31.4 0 0 0 0 12a31.4 31.4 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c1.8.6 9.4.6 9.4.6s7.6 0 9.4-.6a3 3 0 0 0 2.1-2.1A31.4 31.4 0 0 0 24 12a31.4 31.4 0 0 0-.5-5.8ZM9.6 15.6V8.4l6.2 3.6-6.2 3.6Z"/></svg>
                                    @elseif ($social['icon'] === 'telegram')
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.8 15.8 9.4 20c.6 0 .8-.3 1.1-.6l2.7-2.6 5.5 4c1 .6 1.8.3 2-.9l3.7-17.2v-.1c.3-1.3-.5-1.8-1.5-1.5L1.3 9.3c-1.3.5-1.3 1.2-.2 1.6l5.5 1.7L19.4 4c.6-.4 1.2-.2.7.2"/></svg>
                                    @elseif ($social['icon'] === 'whatsapp')
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.7 15l-1.3 4.8 4.9-1.3A10 10 0 1 0 12 2Zm5.9 14.1c-.2.6-1.3 1.2-1.8 1.3-.5.1-1.1.2-1.8 0-.4-.1-1-.3-1.7-.6-3-1.3-5-4.5-5.1-4.7-.1-.2-1.2-1.5-1.2-2.9s.7-2 1-2.3c.3-.3.7-.4.9-.4h.7c.2 0 .4 0 .6.5.2.6.8 2 .8 2.1.1.2.1.4 0 .6-.1.2-.2.4-.4.6-.2.2-.4.4-.5.5-.2.2-.3.4-.1.7.2.4.9 1.5 2 2.4 1.4 1.2 2.6 1.6 2.9 1.8.3.1.5.1.7-.1.2-.3.8-.9 1-1.2.2-.3.4-.2.7-.1.3.1 1.8.9 2.1 1 .3.2.5.2.5.4.1.2.1 1-.2 1.6Z"/></svg>
                                    @else
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.2 20.6a1 1 0 0 1-1-1V4.4a1 1 0 0 1 1-1H19a1 1 0 0 1 1 1v15.2a1 1 0 0 1-1 1H6.2Zm1.5-3.2h9.8l-3.1-3.8a1 1 0 0 0-1.5 0l-1.5 1.8-1.1-1.2a1 1 0 0 0-1.5 0l-1.1 1.3v1.9ZM8.8 7.8a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z"/></svg>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <button type="button" class="inline-flex items-center gap-2 text-sm font-medium text-white/90 transition hover:text-white" aria-label="Cerca nel sito">
                    <span class="hidden md:inline">Cerca</span>
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white text-[var(--agid-primary)] shadow-sm">
                        <x-heroicon-o-magnifying-glass class="h-5 w-5" aria-hidden="true" />
                    </span>
                </button>
            </div>
        </div>
    </div>

    <div class="border-b border-white/15 bg-[var(--agid-primary)]/95">
        <div class="mx-auto hidden w-full max-w-screen-xl items-center justify-between px-4 sm:px-6 lg:flex lg:px-8">
            <nav aria-label="Principale" class="min-w-0 flex-1">
                <ul class="flex items-center gap-1 xl:gap-3" data-element="main-navigation">
                    @foreach ($primaryItems as $item)
                        <li>
                            <a href="{{ $item['url'] ?? '#' }}" class="inline-flex h-14 items-center border-b-2 border-transparent px-3 text-sm font-semibold text-white transition hover:border-white/40 hover:bg-white/6 xl:px-4">
                                <span>{{ $item['label'] ?? '' }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <nav aria-label="Secondaria" class="pl-4">
                <ul class="flex items-center gap-1 xl:gap-2">
                    @foreach ($secondaryItems as $item)
                        <li>
                            <a href="{{ $item['url'] }}" class="inline-flex h-14 items-center gap-2 px-3 text-sm font-medium text-white/95 transition hover:bg-white/6 hover:text-white xl:px-4">
                                <span>{{ $item['label'] }}</span>
                                @if (($item['highlight'] ?? false) === true)
                                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.22 4.97a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 1 1-1.06-1.06L10.94 10 7.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                                    </svg>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>

        <div class="mx-auto flex w-full max-w-screen-xl items-center justify-between px-4 py-3 sm:px-6 lg:hidden lg:px-8">
            <p class="truncate text-sm font-semibold">Menu</p>
            <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-white transition hover:bg-white/10" aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button" aria-label="Apri menu principale">
                <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" id="menu-icon-open">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" id="menu-icon-close">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <nav class="hidden border-t border-white/15 bg-[var(--agid-primary)] px-4 py-4 sm:px-6 lg:hidden" id="mobile-menu" aria-label="Menu principale mobile">
            <div class="space-y-2">
                @foreach ($primaryItems as $item)
                    <a href="{{ $item['url'] ?? '#' }}" class="block rounded-md px-3 py-2 text-white transition hover:bg-white/10">{{ $item['label'] ?? '' }}</a>
                @endforeach
            </div>

            <hr class="my-4 border-white/15">

            <div class="space-y-2">
                @foreach ($secondaryItems as $item)
                    <a href="{{ $item['url'] }}" class="flex items-center justify-between rounded-md px-3 py-2 text-white transition hover:bg-white/10">
                        <span>{{ $item['label'] }}</span>
                        @if (($item['highlight'] ?? false) === true)
                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.22 4.97a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 1 1-1.06-1.06L10.94 10 7.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                            </svg>
                        @endif
                    </a>
                @endforeach
            </div>

            <div class="mt-5 border-t border-white/15 pt-4">
                <p class="mb-3 text-sm font-medium text-white/85">Seguici su</p>
                <div class="flex flex-wrap gap-2">
                    @foreach ($socials as $social)
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-white/10 bg-white/5 text-white transition hover:bg-white/12" aria-label="Seguici su {{ $social['label'] }} - apertura nuova scheda">
                            <span class="sr-only">{{ $social['label'] }}</span>
                            @if ($social['icon'] === 'twitter')
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.643 4.937a9.548 9.548 0 0 1-2.828.775 4.958 4.958 0 0 0 2.165-2.724 9.85 9.85 0 0 1-3.127 1.195 4.916 4.916 0 0 0-8.38 4.482A13.944 13.944 0 0 1 1.671 3.15a4.917 4.917 0 0 0 1.523 6.562 4.897 4.897 0 0 1-2.229-.616v.06a4.923 4.923 0 0 0 3.946 4.827 4.902 4.902 0 0 1-2.224.084 4.93 4.93 0 0 0 4.604 3.417A9.867 9.867 0 0 1 .964 19.54 13.905 13.905 0 0 0 8.548 21.76c9.056 0 14.01-7.503 14.01-14.01 0-.213-.005-.425-.014-.636a10.004 10.004 0 0 0 2.457-2.548Z"/></svg>
                            @elseif ($social['icon'] === 'facebook')
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.5 22v-8h2.7l.4-3h-3.1V9.1c0-.9.3-1.5 1.6-1.5H16.7V5c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3V11H7.3v3H10V22h3.5Z"/></svg>
                            @elseif ($social['icon'] === 'youtube')
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.6 3.5 12 3.5 12 3.5s-7.6 0-9.4.6A3 3 0 0 0 .5 6.2 31.4 31.4 0 0 0 0 12a31.4 31.4 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c1.8.6 9.4.6 9.4.6s7.6 0 9.4-.6a3 3 0 0 0 2.1-2.1A31.4 31.4 0 0 0 24 12a31.4 31.4 0 0 0-.5-5.8ZM9.6 15.6V8.4l6.2 3.6-6.2 3.6Z"/></svg>
                            @elseif ($social['icon'] === 'telegram')
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.8 15.8 9.4 20c.6 0 .8-.3 1.1-.6l2.7-2.6 5.5 4c1 .6 1.8.3 2-.9l3.7-17.2v-.1c.3-1.3-.5-1.8-1.5-1.5L1.3 9.3c-1.3.5-1.3 1.2-.2 1.6l5.5 1.7L19.4 4c.6-.4 1.2-.2.7.2"/></svg>
                            @elseif ($social['icon'] === 'whatsapp')
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.7 15l-1.3 4.8 4.9-1.3A10 10 0 1 0 12 2Zm5.9 14.1c-.2.6-1.3 1.2-1.8 1.3-.5.1-1.1.2-1.8 0-.4-.1-1-.3-1.7-.6-3-1.3-5-4.5-5.1-4.7-.1-.2-1.2-1.5-1.2-2.9s.7-2 1-2.3c.3-.3.7-.4.9-.4h.7c.2 0 .4 0 .6.5.2.6.8 2 .8 2.1.1.2.1.4 0 .6-.1.2-.2.4-.4.6-.2.2-.4.4-.5.5-.2.2-.3.4-.1.7.2.4.9 1.5 2 2.4 1.4 1.2 2.6 1.6 2.9 1.8.3.1.5.1.7-.1.2-.3.8-.9 1-1.2.2-.3.4-.2.7-.1.3.1 1.8.9 2.1 1 .3.2.5.2.5.4.1.2.1 1-.2 1.6Z"/></svg>
                            @else
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.2 20.6a1 1 0 0 1-1-1V4.4a1 1 0 0 1 1-1H19a1 1 0 0 1 1 1v15.2a1 1 0 0 1-1 1H6.2Zm1.5-3.2h9.8l-3.1-3.8a1 1 0 0 0-1.5 0l-1.5 1.8-1.1-1.2a1 1 0 0 0-1.5 0l-1.1 1.3v1.9ZM8.8 7.8a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z"/></svg>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
        </nav>
    </div>
</header>
