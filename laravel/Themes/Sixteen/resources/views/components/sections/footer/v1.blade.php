@php
    $siteTitle = 'Nome del Comune';
    $assetBase = asset('themes/Sixteen/design-comuni/assets');
    $euLogoUrl = $assetBase.'/images/logo-eu-inverted.svg';
    $spritesUrl = $assetBase.'/bootstrap-italia/dist/svg/sprites.svg';

    $administrationLinks = [
        'Organi di governo',
        'Aree amministrative',
        'Uffici',
        'Enti e fondazioni',
        'Politici',
        'Personale amministrativo',
        'Documenti e dati',
    ];

    $serviceColumns = [
        [
            'Anagrafe e stato civile',
            'Cultura e tempo libero',
            'Vita lavorativa',
            'Imprese e commercio',
            'Appalti pubblici',
            'Catasto e urbanistica',
            'Turismo',
            'Mobilità e trasporti',
        ],
        [
            'Educazione e formazione',
            'Giustizia e sicurezza pubblica',
            'Tributi, finanze e contravvenzioni',
            'Ambiente',
            'Salute, benessere e assistenza',
            'Autorizzazioni',
            'Agricoltura e pesca',
        ],
    ];

    $newsLinks = ['Notizie', 'Comunicati', 'Avvisi'];
    $livingLinks = ['Luoghi', 'Eventi'];
    $contactActions = [
        ['label' => 'Leggi le FAQ', 'url' => '#', 'dataElement' => 'faq'],
        ['label' => 'Prenotazione appuntamento', 'url' => '#'],
        ['label' => 'Segnalazione disservizio', 'url' => '#', 'dataElement' => 'report-inefficiency'],
        ['label' => 'Richiesta d\'assistenza', 'url' => '#'],
    ];
    $institutionalLinks = [
        ['label' => 'Amministrazione trasparente', 'url' => '#'],
        ['label' => 'Informativa privacy', 'url' => '#', 'dataElement' => 'privacy-policy-link'],
        ['label' => 'Note legali', 'url' => '#', 'dataElement' => 'legal-notes'],
        ['label' => 'Dichiarazione di accessibilità', 'url' => '#', 'dataElement' => 'accessibility-link'],
    ];
    $socials = [
        ['label' => 'Twitter', 'url' => '#', 'icon' => 'it-twitter'],
        ['label' => 'Facebook', 'url' => '#', 'icon' => 'it-facebook'],
        ['label' => 'YouTube', 'url' => '#', 'icon' => 'it-youtube'],
        ['label' => 'Telegram', 'url' => '#', 'icon' => 'it-telegram'],
        ['label' => 'Whatsapp', 'url' => '#', 'icon' => 'it-whatsapp'],
        ['label' => 'RSS', 'url' => '#', 'icon' => 'it-rss'],
    ];
@endphp

<footer class="it-footer" id="footer">
    <div class="it-footer-main">
        <div class="container">
            <div class="row">
                <div class="col-12 footer-items-wrapper logo-wrapper">
                    <img class="ue-logo" src="{{ $euLogoUrl }}" alt="logo Unione Europea">
                    <div class="it-brand-wrapper">
                        <a href="#">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="{{ $spritesUrl }}#it-pa"></use>
                            </svg>
                            <div class="it-brand-text">
                                <h2 class="no_toc">{{ $siteTitle }}</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 footer-items-wrapper">
                    <h4 class="footer-heading-title">Amministrazione</h4>
                    <ul class="footer-list">
                        @foreach ($administrationLinks as $item)
                            <li>
                                <a href="#">{{ $item }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-6 footer-items-wrapper">
                    <h4 class="footer-heading-title">Categorie di servizio</h4>
                    <div class="row">
                        @foreach ($serviceColumns as $column)
                            <div class="col-md-6">
                                <ul class="footer-list">
                                    @foreach ($column as $item)
                                        <li>
                                            <a href="#">{{ $item }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3 footer-items-wrapper">
                    <h4 class="footer-heading-title">Novità</h4>
                    <ul class="footer-list">
                        @foreach ($newsLinks as $item)
                            <li>
                                <a href="#">{{ $item }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <h4 class="footer-heading-title">Vivere il comune</h4>
                    <ul class="footer-list">
                        @foreach ($livingLinks as $item)
                            <li>
                                <a href="#">{{ $item }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-9 mt-md-4 footer-items-wrapper">
                    <h4 class="footer-heading-title">Contatti</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="footer-info">Comune di {{ $siteTitle }}<br>
                                Via Roma 123 - 00100 Comune<br>
                                Codice fiscale / P. IVA: 00123456789<br><br>
                                <a href="#">Ufficio Relazioni con il Pubblico</a><br>
                                Numero verde: 800 016 123<br>
                                SMS e WhatsApp: +39 320 1234567<br>
                                Posta Elettronica Certificata<br>
                                Centralino unico: 012 3456
                            </p>
                        </div>
                        <div class="col-md-4">
                            <ul class="footer-list">
                                @foreach ($contactActions as $link)
                                    <li>
                                        <a href="{{ $link['url'] }}" @if (isset($link['dataElement'])) data-element="{{ $link['dataElement'] }}" @endif>{{ $link['label'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="footer-list">
                                @foreach ($institutionalLinks as $link)
                                    <li>
                                        <a href="{{ $link['url'] }}" @if (isset($link['dataElement'])) data-element="{{ $link['dataElement'] }}" @endif>{{ $link['label'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-md-4 footer-items-wrapper">
                    <h4 class="footer-heading-title">Seguici su</h4>
                    <ul class="list-inline text-start social">
                        @foreach ($socials as $social)
                            <li class="list-inline-item">
                                <a class="p-1 text-white" href="{{ $social['url'] }}" target="_blank">
                                    <svg class="icon icon-sm icon-white align-top">
                                        <use xlink:href="{{ $spritesUrl }}#{{ $social['icon'] }}"></use>
                                    </svg>
                                    <span class="visually-hidden">{{ $social['label'] }}</span></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 footer-items-wrapper">
                    <div class="footer-bottom">
                        <a href="#">Media policy</a>
                        <a href="#">Mappa del sito</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
