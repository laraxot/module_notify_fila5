<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Nome del Comune' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Portale istituzionale del Comune' }}" />
    
    {{-- Bootstrap Italia CSS --}}
    <link rel="stylesheet" href="/themes/sixteen/bootstrap-italia/dist/css/bootstrap-italia.min.css" />
    
    {{-- Custom CSS --}}
    @vite(['Themes/Sixteen/resources/css/app.css'])
</head>
<body>
    {{-- Skip Links --}}
    <div class="skiplink">
        <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
        <a class="visually-hidden-focusable" href="#footer">Vai al footer</a>
    </div>
    
    {{-- Header --}}
    <header class="it-header-wrapper" data-bs-target="#header-nav-wrapper">
        {{-- TOP BAR --}}
        <div class="it-header-slim-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="it-header-slim-wrapper-content">
                            <a class="active" href="#">Nome della Regione</a>
                            <div class="it-header-slim-right-content">
                                <div class="it-header-slim-language">
                                    <span class="it-header-slim-language-label">Lingua attiva:</span>
                                    <a href="#" class="active" aria-label="Lingua attiva: Italiano">ITA</a>
                                    <span class="it-header-slim-language-divider">/</span>
                                    <a href="#" aria-label="Passa alla lingua: Inglese">ENG</a>
                                </div>
                                <a class="btn btn-primary" href="{{ route('login') }}">
                                    <svg class="icon icon-white icon-xs">
                                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-user"></use>
                                    </svg>
                                    <span>Accedi all'area personale</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- MAIN HEADER --}}
        <div class="it-header-wrapper">
            <div class="it-header-main">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="it-header-main-content">
                                <div class="it-brand-wrapper">
                                    <a href="/">
                                        <svg class="icon" aria-hidden="true">
                                            <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-pa"></use>
                                        </svg>
                                        <div class="it-brand-text">
                                            <h2 class="no_toc">NOME DEL COMUNE</h2>
                                            <p class="no_toc">Un comune da vivere</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="it-right-zone">
                                    {{-- Search --}}
                                    <div class="it-search-wrapper">
                                        <div class="autocomplete-bar">
                                            <form role="search">
                                                <div class="autocomplete">
                                                    <label class="autocomplete-label" for="autocomplete-one">Cerca nel sito</label>
                                                    <input class="autocomplete-input" type="text" name="search" id="autocomplete-one" placeholder="Cerca nel sito" />
                                                    <button class="autocomplete-icon" type="submit" aria-label="Cerca nel sito">
                                                        <svg class="icon">
                                                            <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-search"></use>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    {{-- Social --}}
                                    <div class="it-socials">
                                        <span>Seguici su</span>
                                        <ul>
                                            <li>
                                                <a href="#" aria-label="Twitter" target="_blank">
                                                    <svg class="icon">
                                                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-twitter"></use>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" aria-label="Facebook" target="_blank">
                                                    <svg class="icon">
                                                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-facebook"></use>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" aria-label="YouTube" target="_blank">
                                                    <svg class="icon">
                                                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-youtube"></use>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" aria-label="Telegram" target="_blank">
                                                    <svg class="icon">
                                                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-telegram"></use>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" aria-label="Whatsapp" target="_blank">
                                                    <svg class="icon">
                                                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-whatsapp"></use>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" aria-label="RSS" target="_blank">
                                                    <svg class="icon">
                                                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-rss"></use>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- NAVIGATION --}}
            <div class="it-nav-wrapper">
                <div class="it-nav-close">
                    <button type="button" class="btn-close" aria-label="Chiudi navigazione">
                        <svg class="icon">
                            <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-close"></use>
                        </svg>
                    </button>
                </div>
                <div class="it-main-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="it-nav">
                                    <div class="it-brand-wrapper">
                                        <a href="/">
                                            <svg class="icon" aria-hidden="true">
                                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-pa"></use>
                                            </svg>
                                            <div class="it-brand-text">
                                                <h2 class="no_toc">NOME DEL COMUNE</h2>
                                                <p class="no_toc">Un comune da vivere</p>
                                            </div>
                                        </a>
                                    </div>
                                    <button class="custom-navbar-btn navbar-btn" type="button">
                                        <span class="navbar-toggler-icon">
                                            <svg class="icon">
                                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-burger"></use>
                                            </svg>
                                        </span>
                                        <span class="sr-only">Mostra/nascondi la navigazione</span>
                                    </button>
                                    <div class="menu-wrapper" id="header-nav-wrapper">
                                        <div class="link-list-wrapper menu-link-list">
                                            <h3>Menu di navigazione</h3>
                                            <ul class="link-list">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/it/amministrazione">
                                                        <span>Amministrazione</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/it/novita">
                                                        <span>Novità</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/it/servizi">
                                                        <span>Servizi</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/it/vivere">
                                                        <span>Vivere il Comune</span>
                                                    </a>
                                                </li>
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
    
    {{-- Main Content --}}
    <main id="main-container">
        {{ $slot }}
    </main>
    
    {{-- Footer --}}
    <x-section slug="footer" tpl="full" />
    
    {{-- Bootstrap Italia JS --}}
    <script src="/themes/sixteen/bootstrap-italia/dist/js/bootstrap-italia.bundle.min.js"></script>
</body>
</html>
