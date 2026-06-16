{{--
    |--------------------------------------------------------------------------
    | Footer Partial - Design Comuni
    |--------------------------------------------------------------------------
    |
    | Complete footer with institution logos, links, contacts, and social media.
    |
    | Sections:
    | - Footer Main (logos, brand)
    | - Footer Links (administration, services, news)
    | - Footer Contacts (contact information)
    | - Footer Social (social media links)
    | - Footer Bottom (media policy, sitemap)
    |
    | @package Design Comuni
    | @subpackage Partials
    | @version 1.0.0
    |
--}}

<footer class="it-footer" id="footer">
    <div class="it-footer-main">
        <div class="container">
            
            {{-- Logos and Brand --}}
            <div class="row">
                <div class="col-12 footer-items-wrapper logo-wrapper">
                    {{-- EU Logo --}}
                    @if(config('design-comuni.show_eu_logo', true))
                    <img class="ue-logo" 
                         src="{{ asset('themes/sixteen/design-comuni/assets/images/logo-eu-inverted.svg') }}" 
                         alt="{{ __('logo Unione Europea') }}">
                    @endif
                    
                    {{-- Municipality Brand --}}
                    <div class="it-brand-wrapper">
                        <a href="{{ route('home') }}">
                            @if(config('design-comuni.logo_svg'))
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-pa') }}"></use>
                            </svg>
                            @else
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-pa') }}"></use>
                            </svg>
                            @endif
                            <div class="it-brand-text">
                                <h2 class="no_toc">{{ config('design-comuni.municipality_name', 'Nome del Comune') }}</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            {{-- Footer Links --}}
            <div class="row">
                
                {{-- Administration Links --}}
                <div class="col-md-3 footer-items-wrapper">
                    <h4 class="footer-heading-title">{{ __('Amministrazione') }}</h4>
                    <ul class="footer-list">
                        @foreach(config('design-comuni.footer.administration', [
                            'Organi di governo' => '#',
                            'Aree amministrative' => '#',
                            'Uffici' => '#',
                            'Enti e fondazioni' => '#',
                            'Politici' => '#',
                            'Personale amministrativo' => '#',
                            'Documenti e dati' => '#',
                        ]) as $label => $url)
                        <li>
                            <a href="{{ $url }}">{{ $label }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
                {{-- Services Categories --}}
                <div class="col-md-6 footer-items-wrapper">
                    <h4 class="footer-heading-title">{{ __('Categorie di servizio') }}</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="footer-list">
                                @foreach(array_slice(config('design-comuni.footer.services', [
                                    'Anagrafe e stato civile' => '#',
                                    'Cultura e tempo libero' => '#',
                                    'Vita lavorativa' => '#',
                                    'Imprese e commercio' => '#',
                                    'Appalti pubblici' => '#',
                                    'Catasto e urbanistica' => '#',
                                    'Turismo' => '#',
                                    'Mobilità e trasporti' => '#',
                                ]), 0, 8) as $label => $url)
                                <li>
                                    <a href="{{ $url }}">{{ $label }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="footer-list">
                                @foreach(array_slice(config('design-comuni.footer.services', [
                                    'Educazione e formazione' => '#',
                                    'Giustizia e sicurezza pubblica' => '#',
                                    'Tributi, finanze e contravvenzioni' => '#',
                                    'Ambiente' => '#',
                                    'Salute, benessere e assistenza' => '#',
                                    'Autorizzazioni' => '#',
                                    'Agricoltura e pesca' => '#',
                                ]), 0, 7) as $label => $url)
                                <li>
                                    <a href="{{ $url }}">{{ $label }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                
                {{-- News and Events --}}
                <div class="col-md-3 footer-items-wrapper">
                    <h4 class="footer-heading-title">{{ __('Novità') }}</h4>
                    <ul class="footer-list">
                        @foreach(config('design-comuni.footer.news', [
                            'Notizie' => 'sito.novita',
                            'Comunicati' => 'sito.novita',
                            'Avvisi' => 'sito.novita',
                        ]) as $label => $route)
                        <li>
                            <a href="{{ route($route) }}">{{ $label }}</a>
                        </li>
                        @endforeach
                    </ul>
                    
                    <h4 class="footer-heading-title">{{ __('Vivere il comune') }}</h4>
                    <ul class="footer-list">
                        @foreach(config('design-comuni.footer.living', [
                            'Luoghi' => '#',
                            'Eventi' => 'sito.eventi',
                        ]) as $label => $route)
                        <li>
                            <a href="{{ route($route) }}">{{ $label }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
                {{-- Contacts --}}
                <div class="col-md-9 mt-md-4 footer-items-wrapper">
                    <h4 class="footer-heading-title">{{ __('Contatti') }}</h4>
                    <div class="row">
                        
                        {{-- Contact Information --}}
                        <div class="col-md-4">
                            <p class="footer-info">
                                {!! nl2br(e(config('design-comuni.footer.address', 
                                    "Comune di Nome Comune\nVia Roma 123 - 00100 Comune\nCodice fiscale / P. IVA: 00123456789"
                                ))) !!}
                            </p>
                            <p class="footer-info">
                                <a href="{{ route('contact.urb') }}">{{ __('Ufficio Relazioni con il Pubblico') }}</a><br>
                                {{ __('Numero verde') }}: {{ config('design-comuni.footer.phone_toll_free', '800 016 123') }}<br>
                                {{ __('SMS e WhatsApp') }}: {{ config('design-comuni.footer.phone_mobile', '+39 320 1234567') }}<br>
                                {{ __('Posta Elettronica Certificata') }}<br>
                                {{ __('Centralino unico') }}: {{ config('design-comuni.footer.phone_main', '012 3456') }}
                            </p>
                        </div>
                        
                        {{-- Quick Links --}}
                        <div class="col-md-4">
                            <ul class="footer-list">
                                @foreach(config('design-comuni.footer.quick_links', [
                                    'Leggi le FAQ' => 'sito.domande-frequenti',
                                    'Prenotazione appuntamento' => 'appuntamento.01-ufficio',
                                    'Segnalazione disservizio' => 'segnalazione.dettaglio',
                                    "Richiesta d'assistenza" => 'assistenza.01-dati',
                                ]) as $label => $route)
                                <li>
                                    <a href="{{ route($route) }}" 
                                       data-element="{{ strtolower(str_replace(' ', '-', $label)) }}">
                                        {{ $label }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        
                        {{-- Legal Links --}}
                        <div class="col-md-4">
                            <ul class="footer-list">
                                @foreach(config('design-comuni.footer.legal_links', [
                                    'Amministrazione trasparente' => '#',
                                    'Informativa privacy' => 'privacy',
                                    'Note legali' => 'legal-notes',
                                    'Dichiarazione di accessibilità' => 'accessibility',
                                ]) as $label => $route)
                                <li>
                                    <a href="{{ route($route) }}" 
                                       data-element="{{ strtolower(str_replace(' ', '-', $label)) }}">
                                        {{ $label }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        
                    </div>
                </div>
                
                {{-- Social Media --}}
                <div class="col-md-3 mt-md-4 footer-items-wrapper">
                    <h4 class="footer-heading-title">{{ __('Seguici su') }}</h4>
                    <ul class="list-inline text-start social">
                        @if(config('design-comuni.social.twitter'))
                        <li class="list-inline-item">
                            <a class="p-1 text-white" 
                               href="{{ config('design-comuni.social.twitter') }}" 
                               target="_blank"
                               rel="noopener noreferrer">
                                <svg class="icon icon-sm icon-white align-top">
                                    <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-twitter') }}"></use>
                                </svg>
                                <span class="visually-hidden">Twitter</span>
                            </a>
                        </li>
                        @endif
                        @if(config('design-comuni.social.facebook'))
                        <li class="list-inline-item">
                            <a class="p-1 text-white" 
                               href="{{ config('design-comuni.social.facebook') }}" 
                               target="_blank"
                               rel="noopener noreferrer">
                                <svg class="icon icon-sm icon-white align-top">
                                    <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-facebook') }}"></use>
                                </svg>
                                <span class="visually-hidden">Facebook</span>
                            </a>
                        </li>
                        @endif
                        @if(config('design-comuni.social.youtube'))
                        <li class="list-inline-item">
                            <a class="p-1 text-white" 
                               href="{{ config('design-comuni.social.youtube') }}" 
                               target="_blank"
                               rel="noopener noreferrer">
                                <svg class="icon icon-sm icon-white align-top">
                                    <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-youtube') }}"></use>
                                </svg>
                                <span class="visually-hidden">YouTube</span>
                            </a>
                        </li>
                        @endif
                        @if(config('design-comuni.social.telegram'))
                        <li class="list-inline-item">
                            <a class="p-1 text-white" 
                               href="{{ config('design-comuni.social.telegram') }}" 
                               target="_blank"
                               rel="noopener noreferrer">
                                <svg class="icon icon-sm icon-white align-top">
                                    <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-telegram') }}"></use>
                                </svg>
                                <span class="visually-hidden">Telegram</span>
                            </a>
                        </li>
                        @endif
                        @if(config('design-comuni.social.whatsapp'))
                        <li class="list-inline-item">
                            <a class="p-1 text-white" 
                               href="{{ config('design-comuni.social.whatsapp') }}" 
                               target="_blank"
                               rel="noopener noreferrer">
                                <svg class="icon icon-sm icon-white align-top">
                                    <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-whatsapp') }}"></use>
                                </svg>
                                <span class="visually-hidden">Whatsapp</span>
                            </a>
                        </li>
                        @endif
                        @if(config('design-comuni.social.rss'))
                        <li class="list-inline-item">
                            <a class="p-1 text-white" 
                               href="{{ config('design-comuni.social.rss') }}" 
                               target="_blank"
                               rel="noopener noreferrer">
                                <svg class="icon icon-sm icon-white align-top">
                                    <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-rss') }}"></use>
                                </svg>
                                <span class="visually-hidden">RSS</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                
            </div>
            
            {{-- Footer Bottom --}}
            <div class="row">
                <div class="col-12 footer-items-wrapper">
                    <div class="footer-bottom">
                        <a href="{{ route('media-policy') }}">{{ __('Media policy') }}</a>
                        <a href="{{ route('sitemap') }}">{{ __('Mappa del sito') }}</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</footer>
