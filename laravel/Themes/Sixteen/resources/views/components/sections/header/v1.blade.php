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

<header class="it-header-wrapper" data-bs-target="#header-nav-wrapper">
    <div class="it-header-slim-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="it-header-slim-wrapper-content">
                        <a class="d-lg-block navbar-brand" target="_blank" href="#" aria-label="Vai al portale della Regione - link esterno - apertura nuova scheda" title="Vai al portale della Regione">Nome della Regione</a>
                        <div class="it-header-slim-right-zone" role="navigation">
                            <div class="nav-item dropdown" id="language-dropdown">
                                <button type="button" class="nav-link dropdown-toggle" id="language-button" aria-expanded="false" aria-controls="languages" aria-haspopup="true">
                                    <span class="visually-hidden">Lingua attiva:</span>
                                    <span>ITA</span>
                                    <svg class="icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 10.94l3.71-3.71a.75.75 0 1 1 1.06 1.06l-4.24 4.25a.75.75 0 0 1-1.06 0L5.21 8.29a.75.75 0 0 1 .02-1.08Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div class="dropdown-menu" id="language-menu">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="link-list-wrapper">
                                                <ul class="link-list">
                                                    <li><a class="dropdown-item list-item" href="#"><span>ITA <span class="visually-hidden">selezionata</span></span></a></li>
                                                    <li><a class="dropdown-item list-item" href="#"><span>ENG</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @guest
                                <a class="btn btn-primary btn-icon btn-full" href="{{ route('login') }}" data-element="personal-area-login">
                                    <span class="rounded-icon" aria-hidden="true">
                                        <x-heroicon-o-user class="icon icon-primary" />
                                    </span>
                                    <span class="d-none d-lg-block">Accedi all'area personale</span>
                                </a>
                            @endguest

                            @auth
                                <div class="it-user-wrapper nav-item dropdown">
                                    <button id="dropdownDefaultButton" class="btn btn-primary btn-icon btn-full" type="button" aria-expanded="false" aria-haspopup="true" aria-label="Menu utente - {{ Auth::user()->name }}">
                                        <span class="rounded-icon" aria-hidden="true">
                                            <x-heroicon-o-user class="icon icon-primary" />
                                        </span>
                                        <span class="d-none d-lg-block">{{ Auth::user()->name }}</span>
                                        <svg class="icon icon-white d-none d-lg-block" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 10.94l3.71-3.71a.75.75 0 1 1 1.06 1.06l-4.24 4.25a.75.75 0 0 1-1.06 0L5.21 8.29a.75.75 0 0 1 .02-1.08Z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="dropdown" class="dropdown-menu absolute right-0 z-50 mt-2 w-48 rounded-lg border border-slate-200 bg-white text-slate-800 shadow-lg" role="menu" aria-orientation="vertical" aria-labelledby="dropdownDefaultButton">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="link-list-wrapper">
                                                    <ul class="link-list">
                                                        <li><a class="dropdown-item list-item" href="#"><span>I miei servizi</span></a></li>
                                                        <li><a class="dropdown-item list-item" href="#"><span>Le mie pratiche</span></a></li>
                                                        <li><a class="dropdown-item list-item" href="#"><span>Notifiche</span></a></li>
                                                        <li><span class="divider"></span></li>
                                                        <li><a class="dropdown-item list-item" href="#"><span>Impostazioni</span></a></li>
                                                        <li>
                                                            <form method="POST" action="{{ route('logout') }}">@csrf
                                                                <button type="submit" class="list-item left-icon w-full text-left">
                                                                    <svg class="icon icon-primary icon-sm left" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                                                    </svg>
                                                                    <span class="fw-bold">Esci</span>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="it-nav-wrapper">
        <div class="it-header-center-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="it-header-center-content-wrapper">
                            <div class="it-brand-wrapper">
                                <a href="/" title="Vai alla homepage">
                                    <x-filament-panels::logo class="it-brand-logo" style="width:82px;height:82px;" alt="{{ $siteTitle }}" />
                                    <div class="it-brand-text">
                                        <div class="it-brand-title">{{ $siteTitle }}</div>
                                        <div class="it-brand-tagline d-none d-md-block">{{ $siteSubtitle }}</div>
                                    </div>
                                </a>
                            </div>
                            <div class="it-right-zone">
                                <div class="it-socials d-none d-lg-flex">
                                    <span>Seguici su</span>
                                    <ul>
                                        @foreach ($socials as $social)
                                            <li>
                                                <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer">
                                                    @if ($social['icon'] === 'twitter')
                                                        <svg class="icon icon-sm icon-white align-top" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.643 4.937a9.548 9.548 0 0 1-2.828.775 4.958 4.958 0 0 0 2.165-2.724 9.85 9.85 0 0 1-3.127 1.195 4.916 4.916 0 0 0-8.38 4.482A13.944 13.944 0 0 1 1.671 3.15a4.917 4.917 0 0 0 1.523 6.562 4.897 4.897 0 0 1-2.229-.616v.06a4.923 4.923 0 0 0 3.946 4.827 4.902 4.902 0 0 1-2.224.084 4.93 4.93 0 0 0 4.604 3.417A9.867 9.867 0 0 1 .964 19.54 13.905 13.905 0 0 0 8.548 21.76c9.056 0 14.01-7.503 14.01-14.01 0-.213-.005-.425-.014-.636a10.004 10.004 0 0 0 2.457-2.548Z"/></svg>
                                                    @elseif ($social['icon'] === 'facebook')
                                                        <svg class="icon icon-sm icon-white align-top" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.5 22v-8h2.7l.4-3h-3.1V9.1c0-.9.3-1.5 1.6-1.5H16.7V5c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3V11H7.3v3H10V22h3.5Z"/></svg>
                                                    @elseif ($social['icon'] === 'youtube')
                                                        <svg class="icon icon-sm icon-white align-top" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.6 3.5 12 3.5 12 3.5s-7.6 0-9.4.6A3 3 0 0 0 .5 6.2 31.4 31.4 0 0 0 0 12a31.4 31.4 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c1.8.6 9.4.6 9.4.6s7.6 0 9.4-.6a3 3 0 0 0 2.1-2.1A31.4 31.4 0 0 0 24 12a31.4 31.4 0 0 0-.5-5.8ZM9.6 15.6V8.4l6.2 3.6-6.2 3.6Z"/></svg>
                                                    @elseif ($social['icon'] === 'telegram')
                                                        <svg class="icon icon-sm icon-white align-top" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.8 15.8 9.4 20c.6 0 .8-.3 1.1-.6l2.7-2.6 5.5 4c1 .6 1.8.3 2-.9l3.7-17.2v-.1c.3-1.3-.5-1.8-1.5-1.5L1.3 9.3c-1.3.5-1.3 1.2-.2 1.6l5.5 1.7L19.4 4c.6-.4 1.2-.2.7.2"/></svg>
                                                    @elseif ($social['icon'] === 'whatsapp')
                                                        <svg class="icon icon-sm icon-white align-top" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.7 15l-1.3 4.8 4.9-1.3A10 10 0 1 0 12 2Zm5.9 14.1c-.2.6-1.3 1.2-1.8 1.3-.5.1-1.1.2-1.8 0-.4-.1-1-.3-1.7-.6-3-1.3-5-4.5-5.1-4.7-.1-.2-1.2-1.5-1.2-2.9s.7-2 1-2.3c.3-.3.7-.4.9-.4h.7c.2 0 .4 0 .6.5.2.6.8 2 .8 2.1.1.2.1.4 0 .6-.1.2-.2.4-.4.6-.2.2-.4.4-.5.5-.2.2-.3.4-.1.7.2.4.9 1.5 2 2.4 1.4 1.2 2.6 1.6 2.9 1.8.3.1.5.1.7-.1.2-.3.8-.9 1-1.2.2-.3.4-.2.7-.1.3.1 1.8.9 2.1 1 .3.2.5.2.5.4.1.2.1 1-.2 1.6Z"/></svg>
                                                    @else
                                                        <svg class="icon icon-sm icon-white align-top" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.2 20.6a1 1 0 0 1-1-1V4.4a1 1 0 0 1 1-1H19a1 1 0 0 1 1 1v15.2a1 1 0 0 1-1 1H6.2Zm1.5-3.2h9.8l-3.1-3.8a1 1 0 0 0-1.5 0l-1.5 1.8-1.1-1.2a1 1 0 0 0-1.5 0l-1.1 1.3v1.9ZM8.8 7.8a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z"/></svg>
                                                    @endif
                                                    <span class="visually-hidden">{{ $social['label'] }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="it-search-wrapper">
                                    <span class="d-none d-md-block">Cerca</span>
                                    <button class="search-link rounded-icon" type="button" aria-label="Cerca nel sito">
                                        <x-heroicon-o-magnifying-glass class="icon" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="it-header-navbar-wrapper" id="header-nav-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="navbar navbar-expand-lg has-megamenu">
                            <button class="custom-navbar-toggler" type="button" aria-controls="nav4" aria-expanded="false" aria-label="Mostra/Nascondi la navigazione" data-bs-target="#nav4" data-bs-toggle="navbarcollapsible">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                            <div class="navbar-collapsable" id="nav4">
                                <div class="overlay" style="display: none;"></div>
                                <div class="close-div">
                                    <button class="btn close-menu" type="button">
                                        <span class="visually-hidden">Nascondi la navigazione</span>
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="menu-wrapper">
                                    <a href="/" class="logo-hamburger">
                                        <svg class="icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                            <path d="M12 2 4 5v6c0 5 3.4 9.7 8 11 4.6-1.3 8-6 8-11V5l-8-3Z" />
                                        </svg>
                                        <div class="it-brand-text">
                                            <div class="it-brand-title">{{ $siteTitle }}</div>
                                        </div>
                                    </a>
                                    <nav aria-label="Principale">
                                        <ul class="navbar-nav" data-element="main-navigation">
                                            @foreach ($primaryItems as $item)
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ $item['url'] ?? '#' }}"><span>{{ $item['label'] ?? '' }}</span></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </nav>
                                    <nav aria-label="Secondaria">
                                        <ul class="navbar-nav navbar-secondary">
                                            @foreach ($secondaryItems as $item)
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ $item['url'] }}">
                                                        <span>{{ $item['label'] }}</span>
                                                        @if (($item['highlight'] ?? false) === true)
                                                            <svg class="icon icon-sm" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M7.22 4.97a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 1 1-1.06-1.06L10.94 10 7.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                                            </svg>
                                                        @endif
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </nav>
                                    <div class="it-socials">
                                        <span>Seguici su</span>
                                        <ul>
                                            @foreach ($socials as $social)
                                                <li><a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"><span class="visually-hidden">{{ $social['label'] }}</span></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
