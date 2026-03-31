{{--
    Bootstrap Italia Full Footer
    Source: https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html
    
    Usage:
    <x-section slug="footer" />
--}}

@props([
    'ueLogoUrl' => '/themes/sixteen/bootstrap-italia/dist/images/logo-eu-inverted.svg',
    'title' => 'Nome del Comune',
    'address' => 'Via Roma 123 - 00100 Comune',
    'fiscalCode' => '00123456789',
    'phone' => '012 3456',
    'greenNumber' => '800 016 123',
    'whatsapp' => '+39 320 1234567',
    'email' => 'urp@comune.it',
    'adminLinks' => [
        ['label' => 'Organi di governo', 'url' => '#'],
        ['label' => 'Aree amministrative', 'url' => '#'],
        ['label' => 'Uffici', 'url' => '#'],
        ['label' => 'Enti e fondazioni', 'url' => '#'],
        ['label' => 'Politici', 'url' => '#'],
        ['label' => 'Personale amministrativo', 'url' => '#'],
        ['label' => 'Documenti e dati', 'url' => '#'],
    ],
    'serviceCategories' => [
        ['label' => 'Anagrafe e stato civile', 'url' => '#'],
        ['label' => 'Cultura e tempo libero', 'url' => '#'],
        ['label' => 'Vita lavorativa', 'url' => '#'],
        ['label' => 'Imprese e commercio', 'url' => '#'],
        ['label' => 'Appalti pubblici', 'url' => '#'],
        ['label' => 'Catasto e urbanistica', 'url' => '#'],
        ['label' => 'Turismo', 'url' => '#'],
        ['label' => 'Mobilità e trasporti', 'url' => '#'],
        ['label' => 'Educazione e formazione', 'url' => '#'],
        ['label' => 'Giustizia e sicurezza pubblica', 'url' => '#'],
        ['label' => 'Tributi, finanze e contravvenzioni', 'url' => '#'],
        ['label' => 'Ambiente', 'url' => '#'],
        ['label' => 'Salute, benessere e assistenza', 'url' => '#'],
        ['label' => 'Autorizzazioni', 'url' => '#'],
        ['label' => 'Agricoltura e pesca', 'url' => '#'],
    ],
    'newsLinks' => [
        ['label' => 'Notizie', 'url' => '/it/tests/novita'],
        ['label' => 'Comunicati', 'url' => '#'],
        ['label' => 'Avvisi', 'url' => '#'],
    ],
    'liveLinks' => [
        ['label' => 'Luoghi', 'url' => '#'],
        ['label' => 'Eventi', 'url' => '/it/tests/eventi'],
    ],
    'contactLinks' => [
        ['label' => 'Leggi le FAQ', 'url' => '/it/tests/domande-frequenti'],
        ['label' => 'Prenotazione appuntamento', 'url' => '/it/tests/appuntamento-01-ufficio'],
        ['label' => 'Segnalazione disservizio', 'url' => '#'],
        ['label' => 'Richiesta d\'assistenza', 'url' => '/it/tests/assistenza-01-dati'],
    ],
    'legalLinks' => [
        ['label' => 'Amministrazione trasparente', 'url' => '#'],
        ['label' => 'Informativa privacy', 'url' => '#'],
        ['label' => 'Note legali', 'url' => '#'],
        ['label' => 'Dichiarazione di accessibilità', 'url' => '#'],
    ],
    'socialLinks' => [
        ['platform' => 'twitter', 'url' => '#', 'icon' => 'twitter'],
        ['platform' => 'facebook', 'url' => '#', 'icon' => 'facebook'],
        ['platform' => 'youtube', 'url' => '#', 'icon' => 'youtube'],
        ['platform' => 'telegram', 'url' => '#', 'icon' => 'telegram'],
        ['platform' => 'whatsapp', 'url' => '#', 'icon' => 'whatsapp'],
        ['platform' => 'rss', 'url' => '#', 'icon' => 'rss'],
    ]
])

<footer class="it-footer" id="footer">
    
    {{-- Feedback Module - Bootstrap Italia Style --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <h3 class="h5 mb-4">Quanto sono chiare le informazioni su questa pagina?</h3>
                    <div class="rating-stars mb-3" role="group" aria-label="Valutazione a stelle">
                        @for($i = 1; $i <= 5; $i++)
                        <button type="button" 
                                class="btn btn-link text-warning p-0 mx-1" 
                                aria-label="{{ $i }} {{ Str::plural('stella', $i) }}"
                                data-rating="{{ $i }}">
                            <svg class="icon icon-lg" aria-hidden="true">
                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-star"></use>
                            </svg>
                        </button>
                        @endfor
                    </div>
                    <p class="text-muted small">Clicca sulle stelle per valutare</p>
                    
                    {{-- Hidden Feedback Form --}}
                    <div id="feedback-form" class="mt-4 d-none">
                        <h4 class="h6 mb-3">Grazie! Il tuo parere ci aiuterà a migliorare il servizio.</h4>
                        
                        {{-- Positive Feedback --}}
                        <div class="feedback-positive mb-3">
                            <p class="small mb-2">Quali sono stati gli aspetti che hai preferito?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="feedback-chiaro">
                                <label class="form-check-label small" for="feedback-chiaro">Chiaro</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="feedback-completo">
                                <label class="form-check-label small" for="feedback-completo">Completo</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="feedback-procedura">
                                <label class="form-check-label small" for="feedback-procedura">Procedura corretta</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="feedback-problemi">
                                <label class="form-check-label small" for="feedback-problemi">Nessun problema tecnico</label>
                            </div>
                        </div>
                        
                        {{-- Negative Feedback --}}
                        <div class="feedback-negative mb-3">
                            <p class="small mb-2">Dove hai incontrato le maggiori difficoltà?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="feedback-non-chiaro">
                                <label class="form-check-label small" for="feedback-non-chiaro">Non chiaro</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="feedback-incompleto">
                                <label class="form-check-label small" for="feedback-incompleto">Incompleto</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="feedback-confuso">
                                <label class="form-check-label small" for="feedback-confuso">Confuso</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="feedback-problemi-tecnici">
                                <label class="form-check-label small" for="feedback-problemi-tecnici">Problemi tecnici</label>
                            </div>
                        </div>
                        
                        {{-- Details --}}
                        <div class="mb-3">
                            <label class="form-label small" for="feedback-details">Vuoi aggiungere altri dettagli?</label>
                            <textarea class="form-control" id="feedback-details" rows="3" maxlength="200" placeholder="Max 200 caratteri"></textarea>
                            <small class="text-muted">0/200 caratteri</small>
                        </div>
                        
                        {{-- Buttons --}}
                        <div class="d-flex gap-2 justify-content-center">
                            <button type="button" class="btn btn-outline-secondary btn-sm feedback-back">Indietro</button>
                            <button type="submit" class="btn btn-primary btn-sm">Invia</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Quick Actions Row --}}
    <div class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row g-4">
                {{-- Contatta il Comune --}}
                <div class="col-md-4">
                    <div class="d-flex align-items-start gap-3">
                        <svg class="icon icon-lg text-white" aria-hidden="true">
                            <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-mail"></use>
                        </svg>
                        <div>
                            <h4 class="h6 mb-2">Contatta il Comune</h4>
                            <ul class="list-unstyled small mb-0">
                                <li><a href="#" class="text-white text-decoration-underline">FAQ</a></li>
                                <li><a href="#" class="text-white text-decoration-underline">Assistenza</a></li>
                                <li><a href="#" class="text-white text-decoration-underline">Numero Verde: {{ $greenNumber }}</a></li>
                                <li><a href="#" class="text-white text-decoration-underline">Prenotazione appuntamento</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                {{-- Problemi in Città --}}
                <div class="col-md-4">
                    <div class="d-flex align-items-start gap-3">
                        <svg class="icon icon-lg text-white" aria-hidden="true">
                            <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-warning"></use>
                        </svg>
                        <div>
                            <h4 class="h6 mb-2">Problemi in città?</h4>
                            <ul class="list-unstyled small mb-0">
                                <li><a href="#" class="text-white text-decoration-underline">Segnala un disservizio</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                {{-- Cerca --}}
                <div class="col-md-4">
                    <div class="d-flex align-items-start gap-3">
                        <svg class="icon icon-lg text-white" aria-hidden="true">
                            <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-search"></use>
                        </svg>
                        <div>
                            <h4 class="h6 mb-2">Cerca nel sito</h4>
                            <form class="mb-2">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="Cerca...">
                                    <button class="btn btn-light btn-sm" type="submit">
                                        <svg class="icon icon-xs" aria-hidden="true">
                                            <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-search"></use>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                            <small class="text-white-50">Forse stavi cercando:</small>
                            <ul class="list-unstyled small mb-0">
                                <li><a href="#" class="text-white text-decoration-underline">CIE</a></li>
                                <li><a href="#" class="text-white text-decoration-underline">Residenza</a></li>
                                <li><a href="#" class="text-white text-decoration-underline">Tributi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    <h4 class="footer-heading-title">Amministrazione</h4>
                    <ul class="footer-list">
                        @foreach($adminLinks as $link)
                        <li>
                            <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Column 2: Categorie di servizio --}}
                <div class="col-md-6 footer-items-wrapper">
                    <h4 class="footer-heading-title">Categorie di servizio</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="footer-list">
                                @foreach(array_slice($serviceCategories, 0, 8) as $link)
                                <li>
                                    <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="footer-list">
                                @foreach(array_slice($serviceCategories, 8) as $link)
                                <li>
                                    <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Column 3: Novità + Vivere --}}
                <div class="col-md-3 footer-items-wrapper">
                    <h4 class="footer-heading-title">Novità</h4>
                    <ul class="footer-list">
                        @foreach($newsLinks as $link)
                        <li>
                            <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <h4 class="footer-heading-title">Vivere il comune</h4>
                    <ul class="footer-list">
                        @foreach($liveLinks as $link)
                        <li>
                            <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Row 3: Contatti --}}
                <div class="col-md-9 mt-md-4 footer-items-wrapper">
                    <h4 class="footer-heading-title">Contatti</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="footer-info">
                                {{ $title }}<br>
                                {{ $address }}<br>
                                Codice fiscale / P. IVA: {{ $fiscalCode }}<br><br>
                                <a href="#">Ufficio Relazioni con il Pubblico</a><br>
                                Numero verde: {{ $greenNumber }}<br>
                                SMS e WhatsApp: {{ $whatsapp }}<br>
                                Posta Elettronica Certificata<br>
                                Centralino unico: {{ $phone }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <ul class="footer-list">
                                @foreach($contactLinks as $link)
                                <li>
                                    <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="footer-list">
                                @foreach($legalLinks as $link)
                                <li>
                                    <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Social - Using Filament icon component --}}
                <div class="col-md-3 mt-md-4 footer-items-wrapper">
                    <h4 class="footer-heading-title">Seguici su</h4>
                    <ul class="list-inline text-start social">
                        @foreach($socialLinks as $social)
                        <li class="list-inline-item">
                            <a class="p-1 text-white" href="{{ $social['url'] }}" target="_blank">
                                <x-filament::icon
                                    :icon="'brands.' . $social['icon']"
                                    class="icon icon-sm icon-white align-top"
                                />
                                <span class="visually-hidden">{{ ucfirst($social['platform']) }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer Secondary --}}
    <div class="it-footer-secondary">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="it-footer-small-prints clearfix">
                        <div class="it-footer-small-prints-right">
                            <p class="footer-info">
                                &copy; {{ date('Y') }} {{ $title }} - Tutti i diritti riservati<br>
                                P.IVA: {{ $fiscalCode }} - Codice Fiscale: {{ $fiscalCode }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
