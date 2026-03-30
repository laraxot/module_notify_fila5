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
    $logoUrl = asset('themes/Sixteen/images/logo.svg');
@endphp

@php
    $icon = static function (string $name): string {
        return match ($name) {
            'expand' => '<svg class="icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 10.94l3.71-3.71a.75.75 0 1 1 1.06 1.06l-4.24 4.25a.75.75 0 0 1-1.06 0L5.21 8.29a.75.75 0 0 1 .02-1.08Z" clip-rule="evenodd"/></svg>',
            'user' => '<svg class="icon icon-primary" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 12a4.5 4.5 0 1 0-4.5-4.5A4.5 4.5 0 0 0 12 12Zm0 2.25c-3 0-9 1.5-9 4.5v.75h18v-.75c0-3-6-4.5-9-4.5Z"/></svg>',
            'search' => '<svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path stroke-linecap="round" d="m20 20-3.5-3.5"/></svg>',
            'burger' => '<svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/></svg>',
            'close' => '<svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" d="M6 6l12 12M18 6 6 18"/></svg>',
            'chevron-right' => '<svg class="icon icon-sm" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M7.22 4.97a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 1 1-1.06-1.06L10.94 10 7.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/></svg>',
            'twitter' => '<svg class="icon icon-sm icon-white align-top" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.643 4.937a9.548 9.548 0 0 1-2.828.775 4.958 4.958 0 0 0 2.165-2.724 9.85 9.85 0 0 1-3.127 1.195 4.916 4.916 0 0 0-8.38 4.482A13.944 13.944 0 0 1 1.671 3.15a4.917 4.917 0 0 0 1.523 6.562 4.897 4.897 0 0 1-2.229-.616v.06a4.923 4.923 0 0 0 3.946 4.827 4.902 4.902 0 0 1-2.224.084 4.93 4.93 0 0 0 4.604 3.417A9.867 9.867 0 0 1 .964 19.54 13.905 13.905 0 0 0 8.548 21.76c9.056 0 14.01-7.503 14.01-14.01 0-.213-.005-.425-.014-.636a10.004 10.004 0 0 0 2.457-2.548Z"/></svg>',
            'facebook' => '<svg class="icon icon-sm icon-white align-top" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.5 22v-8h2.7l.4-3h-3.1V9.1c0-.9.3-1.5 1.6-1.5H16.7V5c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3V11H7.3v3H10V22h3.5Z"/></svg>',
            'youtube' => '<svg class="icon icon-sm icon-white align-top" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.6 3.5 12 3.5 12 3.5s-7.6 0-9.4.6A3 3 0 0 0 .5 6.2 31.4 31.4 0 0 0 0 12a31.4 31.4 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c1.8.6 9.4.6 9.4.6s7.6 0 9.4-.6a3 3 0 0 0 2.1-2.1A31.4 31.4 0 0 0 24 12a31.4 31.4 0 0 0-.5-5.8ZM9.6 15.6V8.4l6.2 3.6-6.2 3.6Z"/></svg>',
            'telegram' => '<svg class="icon icon-sm icon-white align-top" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.8 15.8 9.4 20c.6 0 .8-.3 1.1-.6l2.7-2.6 5.5 4c1 .6 1.8.3 2-.9l3.7-17.2v-.1c.3-1.3-.5-1.8-1.5-1.5L1.3 9.3c-1.3.5-1.3 1.2-.2 1.6l5.5 1.7L19.4 4c.6-.4 1.2-.2.7.2"/></svg>',
            'whatsapp' => '<svg class="icon icon-sm icon-white align-top" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.7 15l-1.3 4.8 4.9-1.3A10 10 0 1 0 12 2Zm5.9 14.1c-.2.6-1.3 1.2-1.8 1.3-.5.1-1.1.2-1.8 0-.4-.1-1-.3-1.7-.6-3-1.3-5-4.5-5.1-4.7-.1-.2-1.2-1.5-1.2-2.9s.7-2 1-2.3c.3-.3.7-.4.9-.4h.7c.2 0 .4 0 .6.5.2.6.8 2 .8 2.1.1.2.1.4 0 .6-.1.2-.2.4-.4.6-.2.2-.4.4-.5.5-.2.2-.3.4-.1.7.2.4.9 1.5 2 2.4 1.4 1.2 2.6 1.6 2.9 1.8.3.1.5.1.7-.1.2-.3.8-.9 1-1.2.2-.3.4-.2.7-.1.3.1 1.8.9 2.1 1 .3.2.5.2.5.4.1.2.1 1-.2 1.6Z"/></svg>',
            'rss' => '<svg class="icon icon-sm icon-white align-top" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.18 17.82a1.64 1.64 0 1 1 0-3.28 1.64 1.64 0 0 1 0 3.28ZM4 10.27v3.18a6.55 6.55 0 0 1 6.55 6.55h3.18C13.73 14.59 9.41 10.27 4 10.27Zm0-6.27v3.18c7.95 0 14.41 6.46 14.41 14.41h3.18C21.59 11.89 13.7 4 4 4Z"/></svg>',
            default => '',
        };
    };
@endphp

<header class="it-header-wrapper" data-bs-target="#header-nav-wrapper" role="banner">
    <div class="it-header-slim-wrapper bg-[var(--agid-primary-dark)] text-white">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="it-header-slim-wrapper-content flex min-h-10 items-center justify-between gap-4 py-1">
                <a class="navbar-brand hidden text-xs font-medium text-white lg:block" target="_blank" href="#" aria-label="Vai al portale Nome della Regione - link esterno - apertura nuova scheda" title="Vai al portale Nome della Regione">Nome della Regione</a>
                <div class="it-header-slim-right-zone ml-auto flex items-center gap-3" role="navigation" aria-label="Utility header">
                    <button type="button" class="nav-link dropdown-toggle inline-flex items-center gap-1 text-sm font-semibold text-white/95" aria-expanded="false" aria-controls="languages" aria-haspopup="true">
                        <span class="visually-hidden sr-only">Lingua attiva:</span>
                        <span>ITA</span>
                        {!! $icon('expand') !!}
                    </button>
                    <a class="btn btn-primary btn-icon btn-full inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 text-sm font-semibold text-[var(--agid-primary)]" href="{{ route('login') }}" data-element="personal-area-login">
                        <span class="rounded-icon inline-flex h-7 w-7 items-center justify-center rounded-full bg-[var(--agid-primary)]/10" aria-hidden="true">{!! $icon('user') !!}</span>
                        <span class="hidden lg:block">Accedi all'area personale</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="it-nav-wrapper bg-[var(--agid-primary)] text-white">
        <div class="it-header-center-wrapper border-b border-white/15">
            <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
                <div class="it-header-center-content-wrapper flex items-center justify-between gap-6 py-4 lg:py-5">
                    <div class="it-brand-wrapper min-w-0">
                        <a href="/" class="flex items-center gap-4">
                            <img src="{{ $logoUrl }}" alt="{{ $siteTitle }}" class="h-[52px] w-[52px] shrink-0 sm:h-[72px] sm:w-[72px]" />
                            <div class="it-brand-text min-w-0">
                                <div class="it-brand-title truncate text-2xl font-bold leading-none sm:text-[1.9rem]">{{ $siteTitle }}</div>
                                <div class="it-brand-tagline mt-1 hidden text-sm text-white/90 md:block">{{ $siteSubtitle }}</div>
                            </div>
                        </a>
                    </div>
                    <div class="it-right-zone hidden items-center gap-6 lg:flex">
                        <div class="it-socials d-none d-lg-flex flex items-center gap-3">
                            <span class="text-sm font-medium text-white/90">Seguici su</span>
                            <ul class="flex items-center gap-2">
                                @foreach ($socials as $social)
                                    <li>
                                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-white/10 bg-white/5 transition hover:bg-white/12" aria-label="{{ $social['label'] }}">
                                            {!! $icon($social['icon']) !!}
                                            <span class="visually-hidden sr-only">{{ $social['label'] }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="it-search-wrapper flex items-center gap-2">
                            <span class="hidden text-sm font-medium text-white/90 md:block">Cerca</span>
                            <button class="search-link rounded-icon inline-flex h-10 w-10 items-center justify-center rounded-full bg-white text-[var(--agid-primary)] shadow-sm" type="button" aria-label="Cerca nel sito">
                                {!! $icon('search') !!}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="it-header-navbar-wrapper" id="header-nav-wrapper">
            <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
                <div class="navbar navbar-expand-lg has-megamenu">
                    <button class="custom-navbar-toggler inline-flex items-center justify-center py-3 text-white lg:hidden" type="button" aria-controls="nav4" aria-expanded="false" aria-label="Mostra/Nascondi la navigazione" data-bs-target="#nav4" id="mobile-menu-button">
                        {!! $icon('burger') !!}
                    </button>
                    <div class="navbar-collapsable hidden w-full lg:block" id="nav4">
                        <div class="menu-wrapper lg:flex lg:items-center lg:justify-between">
                            <a href="/" class="logo-hamburger flex items-center gap-3 py-4 lg:hidden">
                                <img src="{{ $logoUrl }}" alt="{{ $siteTitle }}" class="h-10 w-10 shrink-0" />
                                <div class="it-brand-text">
                                    <div class="it-brand-title text-base font-semibold">{{ $siteTitle }}</div>
                                </div>
                            </a>
                            <nav aria-label="Principale" class="min-w-0 flex-1">
                                <ul class="navbar-nav flex flex-col lg:flex-row" data-element="main-navigation">
                                    @foreach ($primaryItems as $item)
                                        <li class="nav-item">
                                            <a class="nav-link inline-flex h-12 items-center px-3 text-sm font-semibold text-white lg:h-14 lg:px-4" href="{{ $item['url'] ?? '#' }}">
                                                <span>{{ $item['label'] ?? '' }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </nav>
                            <nav aria-label="Secondaria" class="lg:pl-4">
                                <ul class="navbar-nav navbar-secondary flex flex-col lg:flex-row">
                                    @foreach ($secondaryItems as $item)
                                        <li class="nav-item">
                                            <a class="nav-link inline-flex h-12 items-center gap-2 px-3 text-sm font-medium text-white/95 lg:h-14 lg:px-4" href="{{ $item['url'] }}">
                                                <span>{{ $item['label'] }} @if(($item['highlight'] ?? false) === true){!! $icon('chevron-right') !!}@endif</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </nav>
                            <div class="it-socials mt-4 border-t border-white/15 pt-4 lg:hidden">
                                <span class="text-sm font-medium text-white/90">Seguici su</span>
                                <ul class="mt-3 flex flex-wrap items-center gap-2">
                                    @foreach ($socials as $social)
                                        <li>
                                            <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-white/10 bg-white/5 transition hover:bg-white/12" aria-label="{{ $social['label'] }}">
                                                {!! $icon($social['icon']) !!}
                                                <span class="visually-hidden sr-only">{{ $social['label'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
