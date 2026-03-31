{{--
    Bootstrap Italia Header Component
    Design Comuni Template - Tailwind CSS
--}}

@props(['data' => []])

<header class="it-header-wrapper" role="banner">
    {{-- Header Slim - Institutional Blue (#0066B3) --}}
    <div class="it-header-slim-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="it-header-slim-wrapper-content">
                        {{-- Regione/Comune Link --}}
                        <a class="d-lg-block navbar-brand" 
                           href="#" 
                           target="_blank"
                           aria-label="Vai al portale {Nome della Regione}"
                           title="Vai al portale {Nome della Regione}">
                            Nome della Regione
                        </a>
                        
                        {{-- Right Zone: Language + Login --}}
                        <div class="it-header-slim-right-zone" role="navigation">
                            {{-- Language Selector --}}
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
                                <div class="dropdown-menu" id="languages">
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
                               href="#"
                               data-element="personal-area-login">
                                <span class="rounded-icon" aria-hidden="true">
                                    <svg class="icon icon-primary">
                                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-user"></use>
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
    
    {{-- Header Center - White Background --}}
    <div class="it-header-center-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="it-header-center-content-wrapper">
                        {{-- Brand Wrapper (Logo + Name + Slogan) --}}
                        <div class="it-brand-wrapper">
                            <a href="/">
                                {{-- Logo SVG (82x82) --}}
                                <svg width="82" height="82" class="icon" aria-hidden="true">
                                    <image xlink:href="/themes/sixteen/assets/images/logo-comune.svg"/>
                                </svg>
                                
                                {{-- Brand Text --}}
                                <div class="it-brand-text">
                                    <div class="it-brand-title">Il mio Comune</div>
                                    <div class="it-brand-slogan d-none d-md-block">Un comune da vivere</div>
                                </div>
                            </a>
                        </div>
                        
                        {{-- Right Zone: Social + Search --}}
                        <div class="it-right-zone">
                            {{-- Social Icons --}}
                            <div class="it-socials">
                                <h4 class="sr-only">Seguici su</h4>
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item">
                                        <a href="#" aria-label="Facebook">
                                            <svg class="icon">
                                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-facebook"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" aria-label="Twitter">
                                            <svg class="icon">
                                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-twitter"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" aria-label="YouTube">
                                            <svg class="icon">
                                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-youtube"></use>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            {{-- Search Bar --}}
                            <div class="it-search-wrapper">
                                <form role="search" action="/search" method="get">
                                    <div class="input-group">
                                        <input type="text" 
                                               class="form-control" 
                                               placeholder="Cerca..."
                                               aria-label="Cerca nel sito"
                                               name="q">
                                        <button class="btn" type="submit" aria-label="Cerca">
                                            <svg class="icon">
                                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-search"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Header Navbar - Dark Blue (#003366) --}}
    <div class="it-header-navbar-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" 
                                type="button" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#navbar-main"
                                aria-controls="navbar-main"
                                aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <div class="collapse navbar-collapse" id="navbar-main">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/it/tests/argomenti">Argomenti</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/it/tests/servizi">Servizi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/it/tests/novita">Novità</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/it/tests/amministrazione">Amministrazione</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/it/tests/eventi">Eventi</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
