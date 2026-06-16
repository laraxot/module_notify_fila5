{{--
    |--------------------------------------------------------------------------
    | Header Partial - Design Comuni
    |--------------------------------------------------------------------------
    |
    | Complete header with slim bar, brand, navigation, and search.
    |
    | Components included:
    | - Header Slim (region link, language, login)
    | - Header Brand (logo, social links)
    | - Header Search (search button and modal)
    | - Header Navigation (main navigation with megamenu)
    |
    | @package Design Comuni
    | @subpackage Partials
    | @version 1.0.0
    |
--}}

<header class="it-header-wrapper" data-bs-target="#header-nav-wrapper">
    
    {{-- Header Slim - Top bar --}}
    <div class="it-header-slim-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="it-header-slim-wrapper-content">
                        {{-- Region Link --}}
                        <a class="d-lg-block navbar-brand" 
                           target="_blank" 
                           href="{{ config('design-comuni.region_url', '#') }}"
                           aria-label="Vai al portale {Nome della Regione} - link esterno - apertura nuova scheda"
                           title="Vai al portale {Nome della Regione}">
                            {{ config('design-comuni.region_name', 'Nome della Regione') }}
                        </a>
                        
                        {{-- Header Slim Right Zone --}}
                        <div class="it-header-slim-right-zone" role="navigation">
                            
                            {{-- Language Selector --}}
                            @if(config('design-comuni.show_language_selector', true))
                            <div class="nav-item dropdown">
                                <button type="button" 
                                        class="nav-link dropdown-toggle" 
                                        data-bs-toggle="dropdown" 
                                        aria-expanded="false" 
                                        aria-controls="languages" 
                                        aria-haspopup="true">
                                    <span class="visually-hidden">Lingua attiva:</span>
                                    <span>{{ strtoupper(app()->getLocale()) }}</span>
                                    <svg class="icon">
                                        <use href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-expand') }}"></use>
                                    </svg>
                                </button>
                                <div class="dropdown-menu">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="link-list-wrapper">
                                                <ul class="link-list">
                                                    @foreach(config('design-comuni.available_languages', ['it' => 'Italiano', 'en' => 'English']) as $code => $name)
                                                    <li>
                                                        <a class="dropdown-item list-item" 
                                                           href="{{ route('language.switch', $code) }}">
                                                            <span>
                                                                {{ strtoupper($code) }}
                                                                @if(app()->getLocale() === $code)
                                                                    <span class="visually-hidden">selezionata</span>
                                                                @endif
                                                            </span>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            {{-- Login Button --}}
                            @if(config('design-comuni.show_login', true))
                            <a class="btn btn-primary btn-icon btn-full" 
                               href="{{ route('login') }}" 
                               data-element="personal-area-login">
                                <span class="rounded-icon" aria-hidden="true">
                                    <svg class="icon icon-primary">
                                        <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-user') }}"></use>
                                    </svg>
                                </span>
                                <span class="d-none d-lg-block">{{ __('Accedi all\'area personale') }}</span>
                            </a>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Navigation Wrapper --}}
    <div class="it-nav-wrapper">
        
        {{-- Header Center - Brand and Search --}}
        <div class="it-header-center-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="it-header-center-content-wrapper">
                            
                            {{-- Brand --}}
                            <div class="it-brand-wrapper">
                                <a href="{{ route('home') }}">
                                    @if(config('design-comuni.logo_svg'))
                                    <svg width="82" height="82" class="icon" aria-hidden="true">
                                        <image xlink:href="{{ config('design-comuni.logo_svg') }}"/>
                                    </svg>
                                    @else
                                    <svg width="82" height="82" class="icon" aria-hidden="true">
                                        <use href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-pa') }}"></use>
                                    </svg>
                                    @endif
                                    <div class="it-brand-text">
                                        <div class="it-brand-title">{{ config('design-comuni.municipality_name', 'Il mio Comune') }}</div>
                                        @if(config('design-comuni.tagline'))
                                        <div class="it-brand-tagline d-none d-md-block">{{ config('design-comuni.tagline') }}</div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                            
                            {{-- Right Zone - Social and Search --}}
                            <div class="it-right-zone">
                                
                                {{-- Social Links --}}
                                @if(config('design-comuni.show_social', true))
                                <div class="it-socials d-none d-lg-flex">
                                    <span>{{ __('Seguici su') }}</span>
                                    <ul>
                                        @if(config('design-comuni.social.twitter'))
                                        <li>
                                            <a href="{{ config('design-comuni.social.twitter') }}" target="_blank">
                                                <svg class="icon icon-sm icon-white align-top">
                                                    <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-twitter') }}"></use>
                                                </svg>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>
                                        @endif
                                        @if(config('design-comuni.social.facebook'))
                                        <li>
                                            <a href="{{ config('design-comuni.social.facebook') }}" target="_blank">
                                                <svg class="icon icon-sm icon-white align-top">
                                                    <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-facebook') }}"></use>
                                                </svg>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        @endif
                                        @if(config('design-comuni.social.youtube'))
                                        <li>
                                            <a href="{{ config('design-comuni.social.youtube') }}" target="_blank">
                                                <svg class="icon icon-sm icon-white align-top">
                                                    <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-youtube') }}"></use>
                                                </svg>
                                                <span class="visually-hidden">YouTube</span>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                @endif
                                
                                {{-- Search Button --}}
                                @if(config('design-comuni.show_search', true))
                                <div class="it-search-wrapper">
                                    <span class="d-none d-md-block">{{ __('Cerca') }}</span>
                                    <button class="search-link rounded-icon" 
                                            type="button" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#search-modal" 
                                            aria-label="{{ __('Cerca nel sito') }}">
                                        <svg class="icon">
                                            <use href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-search') }}"></use>
                                        </svg>
                                    </button>
                                </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Navbar Wrapper --}}
        <div class="it-header-navbar-wrapper" id="header-nav-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        
                        {{-- Navigation --}}
                        <div class="navbar navbar-expand-lg has-megamenu">
                            <button class="custom-navbar-toggler" 
                                    type="button" 
                                    aria-controls="nav4" 
                                    aria-expanded="false" 
                                    aria-label="{{ __('Mostra/Nascondi la navigazione') }}" 
                                    data-bs-target="#nav4" 
                                    data-bs-toggle="navbarcollapsible">
                                <svg class="icon">
                                    <use href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-burger') }}"></use>
                                </svg>
                            </button>
                            <div class="navbar-collapsable" id="nav4">
                                <div class="overlay" style="display: none;"></div>
                                <div class="close-div">
                                    <button class="btn close-menu" type="button">
                                        <span class="visually-hidden">{{ __('Nascondi la navigazione') }}</span>
                                        <svg class="icon">
                                            <use href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-close-big') }}"></use>
                                        </svg>
                                    </button>
                                </div>
                                <div class="menu-wrapper">
                                    
                                    {{-- Hamburger Logo --}}
                                    <a href="{{ route('home') }}" class="logo-hamburger">
                                        <svg class="icon" aria-hidden="true">
                                            <use href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-pa') }}"></use>
                                        </svg>
                                        <div class="it-brand-text">
                                            <div class="it-brand-title">{{ config('design-comuni.municipality_name', 'Nome del Comune') }}</div>
                                        </div>
                                    </a>
                                    
                                    {{-- Main Navigation --}}
                                    <nav aria-label="Principale">
                                        <ul class="navbar-nav" data-element="main-navigation">
                                            @foreach(config('design-comuni.main_menu', [
                                                ['label' => 'Amministrazione', 'url' => 'sito.amministrazione'],
                                                ['label' => 'Novità', 'url' => 'sito.novita'],
                                                ['label' => 'Servizi', 'url' => 'sito.servizi'],
                                                ['label' => 'Vivere il Comune', 'url' => 'sito.eventi'],
                                            ]) as $item)
                                            <li class="nav-item">
                                                <a class="nav-link" 
                                                   href="{{ route($item['url']) }}" 
                                                   data-element="{{ $item['element'] ?? strtolower(str_replace(' ', '-', $item['label'])) }}">
                                                    <span>{{ $item['label'] }}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </nav>
                                    
                                    {{-- Secondary Navigation --}}
                                    @if(config('design-comuni.show_secondary_menu', true))
                                    <nav aria-label="Secondaria">
                                        <ul class="navbar-nav navbar-secondary">
                                            @foreach(config('design-comuni.secondary_menu', [
                                                ['label' => 'Iscrizioni', 'url' => 'sito.argomento'],
                                                ['label' => 'Estate in città', 'url' => 'sito.argomento'],
                                                ['label' => 'Polizia locale', 'url' => 'sito.argomento'],
                                            ]) as $item)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route($item['url']) }}">{{ $item['label'] }}</a>
                                            </li>
                                            @endforeach
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('sito.argomenti') }}" data-element="all-topics">
                                                    <span>{{ __('Tutti gli argomenti') }}
                                                        <svg class="icon icon-sm">
                                                            <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-chevron-right') }}"></use>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                    @endif
                                    
                                    {{-- Social in Mobile --}}
                                    @if(config('design-comuni.show_social', true))
                                    <div class="it-socials d-block d-lg-none">
                                        <span>{{ __('Seguici su') }}</span>
                                        <ul>
                                            @if(config('design-comuni.social.twitter'))
                                            <li>
                                                <a href="{{ config('design-comuni.social.twitter') }}" target="_blank">
                                                    <svg class="icon icon-sm icon-white align-top">
                                                        <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-twitter') }}"></use>
                                                    </svg>
                                                    <span class="visually-hidden">Twitter</span>
                                                </a>
                                            </li>
                                            @endif
                                            @if(config('design-comuni.social.facebook'))
                                            <li>
                                                <a href="{{ config('design-comuni.social.facebook') }}" target="_blank">
                                                    <svg class="icon icon-sm icon-white align-top">
                                                        <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-facebook') }}"></use>
                                                    </svg>
                                                    <span class="visually-hidden">Facebook</span>
                                                </a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                    @endif
                                    
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
@if(config('design-comuni.show_search', true))
<div class="modal fade search-modal" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="search-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="search-modal-title">Cerca nel sito</h2>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <svg class="icon">
                        <use href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-close') }}"></use>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form role="search" action="{{ route('search') }}" method="GET">
                    <div class="form-group autocomplete">
                        <label for="search-input">{{ __('Cerca') }}</label>
                        <input type="text" 
                               class="autocomplete-item" 
                               id="search-input" 
                               name="q"
                               placeholder="{{ __('Cosa cerchi?') }}"
                               autocomplete="off">
                        <button class="autocomplete-icon" type="submit" aria-label="Cerca">
                            <svg class="icon">
                                <use href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-search') }}"></use>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
