<header class="it-header-wrapper" data-bs-target="#header-nav-wrapper">
    @props([
        'regionName' => 'Nome della Regione',
        'logoUrl' => '/themes/sixteen/images/logo-comune.svg',
        'title' => 'Il mio Comune',
        'tagline' => 'Un comune da vivere',
        'navItems' => [
            ['label' => 'Amministrazione', 'url' => '/it/tests/amministrazione'],
            ['label' => 'Novità', 'url' => '/it/tests/novita'],
            ['label' => 'Servizi', 'url' => '/it/tests/servizi'],
            ['label' => 'Vivere il Comune', 'url' => '/it/tests/eventi'],
        ],
        'secondaryNavItems' => [
            ['label' => 'Iscrizioni', 'url' => '#'],
            ['label' => 'Estate in città', 'url' => '#'],
            ['label' => 'Polizia locale', 'url' => '#'],
            ['label' => 'Tutti gli argomenti', 'url' => '/it/tests/argomenti'],
        ],
        'socialLinks' => [
            ['platform' => 'twitter', 'url' => '#', 'icon' => 'it-twitter'],
            ['platform' => 'facebook', 'url' => '#', 'icon' => 'it-facebook'],
            ['platform' => 'youtube', 'url' => '#', 'icon' => 'it-youtube'],
            ['platform' => 'telegram', 'url' => '#', 'icon' => 'it-telegram'],
            ['platform' => 'whatsapp', 'url' => '#', 'icon' => 'it-whatsapp'],
            ['platform' => 'rss', 'url' => '#', 'icon' => 'it-rss'],
        ]
    ])

    {{-- Level 1: Header Slim - Regione, Lingua, Login --}}
    <div class="it-header-slim-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="it-header-slim-wrapper-content">
                        {{-- Regione Link --}}
                        <a class="d-lg-block navbar-brand" 
                           target="_blank" 
                           href="#" 
                           aria-label="Vai al portale {{ $regionName }} - link esterno - apertura nuova scheda" 
                           title="Vai al portale {{ $regionName }}">
                            {{ $regionName }}
                        </a>
                        
                        {{-- Right Zone: Language + Login --}}
                        <div class="it-header-slim-right-zone" role="navigation">
                            {{-- Language Dropdown --}}
                            <div class="nav-item dropdown">
                                <button type="button" 
                                        class="nav-link dropdown-toggle" 
                                        data-bs-toggle="dropdown" 
                                        aria-expanded="false" 
                                        aria-controls="languages" 
                                        aria-haspopup="true">
                                    <span class="visually-hidden">Lingua attiva:</span>
                                    <span>ITA</span>
                                    <svg class="icon">
                                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-expand"></use>
                                    </svg>
                                </button>
                                <div class="dropdown-menu">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="link-list-wrapper">
                                                <ul class="link-list">
                                                    <li>
                                                        <a class="dropdown-item list-item" href="#">
                                                            <span>ITA <span class="visually-hidden">selezionata</span></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item list-item" href="#">
                                                            <span>ENG</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Login Button --}}
                            <a class="btn btn-primary btn-icon btn-full" 
                               href="/login" 
                               data-element="personal-area-login">
                                <span class="rounded-icon" aria-hidden="true">
                                    <svg class="icon icon-primary">
                                        <use xlink:href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-user"></use>
                                    </svg>
                                </span>
                                <span class="d-none d-lg-block">Accedi all'area personale</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Level 2 & 3: Header Center + Navbar --}}
    <div class="it-nav-wrapper">
        {{-- Level 2: Header Center - Logo, Social, Search --}}
        <div class="it-header-center-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="it-header-center-content-wrapper">
                            {{-- Brand/Logo --}}
                            <div class="it-brand-wrapper">
                                <a href="/it/tests/homepage">
                                    <svg width="82" height="82" class="icon" aria-hidden="true">
                                        <image xlink:href="{{ $logoUrl }}"/>
                                    </svg>
                                    <div class="it-brand-text">
                                        <div class="it-brand-title">{{ $title }}</div>
                                        <div class="it-brand-tagline d-none d-md-block">{{ $tagline }}</div>
                                    </div>
                                </a>
                            </div>
                            
                            {{-- Right Zone: Social + Search --}}
                            <div class="it-right-zone">
                                {{-- Social Icons --}}
                                <div class="it-socials d-none d-lg-flex">
                                    <span>Seguici su</span>
                                    <ul>
                                        @foreach($socialLinks as $social)
                                            <li>
                                                <a href="{{ $social['url'] }}" target="_blank">
                                                    <svg class="icon icon-sm icon-white align-top">
                                                        <use xlink:href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#{{ $social['icon'] }}"></use>
                                                    </svg>
                                                    <span class="visually-hidden">{{ ucfirst($social['platform']) }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                
                                {{-- Search Button --}}
                                <div class="it-search-wrapper">
                                    <span class="d-none d-md-block">Cerca</span>
                                    <button class="search-link rounded-icon" 
                                            type="button" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#search-modal" 
                                            aria-label="Cerca nel sito">
                                        <svg class="icon">
                                            <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-search"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Level 3: Header Navbar - Navigation Menu --}}
        <div class="it-header-navbar-wrapper" id="header-nav-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        {{-- Navigation Menu --}}
                        <div class="navbar navbar-expand-lg has-megamenu">
                            {{-- Hamburger Button (Mobile) --}}
                            <button class="custom-navbar-toggler" 
                                    type="button" 
                                    aria-controls="nav4" 
                                    aria-expanded="false" 
                                    aria-label="Mostra/Nascondi la navigazione" 
                                    data-bs-target="#nav4" 
                                    data-bs-toggle="navbarcollapsible">
                                <svg class="icon">
                                    <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-burger"></use>
                                </svg>
                            </button>
                            
                            {{-- Collapsible Menu --}}
                            <div class="navbar-collapsable" id="nav4">
                                <div class="overlay"></div>
                                <div class="close-div">
                                    <button class="btn close-menu" type="button">
                                        <span class="visually-hidden">Nascondi la navigazione</span>
                                        <svg class="icon">
                                            <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-close-big"></use>
                                        </svg>
                                    </button>
                                </div>
                                
                                {{-- Menu Wrapper --}}
                                <div class="menu-wrapper">
                                    {{-- Logo Hamburger (Mobile) --}}
                                    <a href="/it/tests/homepage" class="logo-hamburger">
                                        <svg class="icon" aria-hidden="true">
                                            <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-pa"></use>
                                        </svg>
                                        <div class="it-brand-text">
                                            <div class="it-brand-title">{{ $title }}</div>
                                        </div>
                                    </a>
                                    
                                    {{-- Primary Navigation --}}
                                    <nav aria-label="Principale">
                                        <ul class="navbar-nav" data-element="main-navigation">
                                            @foreach($navItems as $item)
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ $item['url'] }}">
                                                        <span>{{ $item['label'] }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </nav>
                                    
                                    {{-- Secondary Navigation --}}
                                    <nav aria-label="Secondaria">
                                        <ul class="navbar-nav navbar-secondary">
                                            @foreach($secondaryNavItems as $item)
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ $item['url'] }}">
                                                        {{ $item['label'] }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </nav>
                                    
                                    {{-- Social Icons (Mobile) --}}
                                    <div class="it-socials">
                                        <span>Seguici su</span>
                                        <ul>
                                            @foreach($socialLinks as $social)
                                                <li>
                                                    <a href="{{ $social['url'] }}" target="_blank">
                                                        <svg class="icon icon-sm icon-white align-top">
                                                            <use xlink:href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#{{ $social['icon'] }}"></use>
                                                        </svg>
                                                        <span class="visually-hidden">{{ ucfirst($social['platform']) }}</span>
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
        </div>
    </div>
</header>

{{-- Search Modal --}}
<div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="search-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="search-modal-label">Cerca nel sito</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <svg class="icon">
                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-close-big"></use>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form class="search-form" role="search">
                    <div class="form-group">
                        <label for="search-input" class="visually-hidden">Cerca</label>
                        <input type="search" class="form-control" id="search-input" placeholder="Cerca..." />
                    </div>
                    <button type="submit" class="btn btn-primary">Cerca</button>
                </form>
            </div>
        </div>
    </div>
</div>
