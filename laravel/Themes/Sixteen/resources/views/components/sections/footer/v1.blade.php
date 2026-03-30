@php
    $siteTitle = (string) ($_theme->metatag('title') ?: 'Nome del Comune');
    $euLogoUrl = asset('themes/Sixteen/images/logo-eu-inverted.svg');
    $spriteUrl = asset('themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg');
    $contact = config('sixteen.contact', []);
    $socialConfig = config('sixteen.social', []);

    $administrationLinks = [
        ['label' => 'Organi di governo', 'url' => '#'],
        ['label' => 'Aree amministrative', 'url' => '#'],
        ['label' => 'Uffici', 'url' => '#'],
        ['label' => 'Enti e fondazioni', 'url' => '#'],
        ['label' => 'Politici', 'url' => '#'],
        ['label' => 'Personale amministrativo', 'url' => '#'],
        ['label' => 'Documenti e dati', 'url' => '#'],
    ];

    $serviceColumns = [
        [
            ['label' => 'Anagrafe e stato civile', 'url' => '#'],
            ['label' => 'Cultura e tempo libero', 'url' => '#'],
            ['label' => 'Vita lavorativa', 'url' => '#'],
            ['label' => 'Imprese e commercio', 'url' => '#'],
            ['label' => 'Appalti pubblici', 'url' => '#'],
            ['label' => 'Catasto e urbanistica', 'url' => '#'],
            ['label' => 'Turismo', 'url' => '#'],
            ['label' => 'Mobilità e trasporti', 'url' => '#'],
        ],
        [
            ['label' => 'Educazione e formazione', 'url' => '#'],
            ['label' => 'Giustizia e sicurezza pubblica', 'url' => '#'],
            ['label' => 'Tributi, finanze e contravvenzioni', 'url' => '#'],
            ['label' => 'Ambiente', 'url' => '#'],
            ['label' => 'Salute, benessere e assistenza', 'url' => '#'],
            ['label' => 'Autorizzazioni', 'url' => '#'],
            ['label' => 'Agricoltura e pesca', 'url' => '#'],
        ],
    ];

    $newsLinks = [
        ['label' => 'Notizie', 'url' => '#'],
        ['label' => 'Comunicati', 'url' => '#'],
        ['label' => 'Avvisi', 'url' => '#'],
    ];

    $livingLinks = [
        ['label' => 'Luoghi', 'url' => '#'],
        ['label' => 'Eventi', 'url' => '#'],
    ];

    $contactInfoHtml = sprintf(
        'Comune di %s<br>%s<br>Codice fiscale / P. IVA: %s<br><br><a href="#">Ufficio Relazioni con il Pubblico</a><br>Numero verde: 800 016 123<br>SMS e WhatsApp: +39 320 1234567<br>Posta Elettronica Certificata<br>Centralino unico: %s',
        e($siteTitle),
        $contact['address'] ?? 'Via Roma 123 - 00100 Comune',
        $contact['cf_piva'] ?? '00123456789',
        $contact['phone'] ?? '012 3456'
    );

    $contactLinksLeft = [
        ['label' => 'Leggi le FAQ', 'url' => '#', 'attributes' => ['data-element' => 'faq']],
        ['label' => 'Prenotazione appuntamento', 'url' => '#'],
        ['label' => 'Segnalazione disservizio', 'url' => '#', 'attributes' => ['data-element' => 'report-inefficiency']],
        ['label' => 'Richiesta d\'assistenza', 'url' => '#'],
    ];

    $contactLinksRight = [
        ['label' => 'Amministrazione trasparente', 'url' => '#'],
        ['label' => 'Informativa privacy', 'url' => '#', 'attributes' => ['data-element' => 'privacy-policy-link']],
        ['label' => 'Note legali', 'url' => '#', 'attributes' => ['data-element' => 'legal-notes']],
        ['label' => 'Dichiarazione di accessibilità', 'url' => '#', 'attributes' => ['data-element' => 'accessibility-link']],
    ];

    $socials = [
        ['label' => 'Twitter', 'url' => $socialConfig['twitter'] ?? '#', 'icon' => 'it-twitter'],
        ['label' => 'Facebook', 'url' => $socialConfig['facebook'] ?? '#', 'icon' => 'it-facebook'],
        ['label' => 'YouTube', 'url' => $socialConfig['youtube'] ?? '#', 'icon' => 'it-youtube'],
        ['label' => 'Telegram', 'url' => $socialConfig['telegram'] ?? '#', 'icon' => 'it-telegram'],
        ['label' => 'Whatsapp', 'url' => $socialConfig['whatsapp'] ?? '#', 'icon' => 'it-whatsapp'],
        ['label' => 'RSS', 'url' => '/feed', 'icon' => 'it-rss'],
    ];

    $footerBottomLinks = [
        ['label' => 'Media policy', 'url' => '#'],
        ['label' => 'Mappa del sito', 'url' => '#'],
    ];
@endphp

<footer class="it-footer" id="footer">
    <div class="it-footer-main">
        <div class="container">
            <div class="row">
                <div class="col-12 footer-items-wrapper logo-wrapper">
                    <img class="ue-logo" src="{{ $euLogoUrl }}" alt="logo Unione Europea">
                    <div class="it-brand-wrapper">
                        <a href="/">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="{{ $spriteUrl }}#it-pa"></use>
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
                        @foreach ($administrationLinks as $link)
                            <li>
                                <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
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
                                    @foreach ($column as $link)
                                        <li>
                                            <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
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
                        @foreach ($newsLinks as $link)
                            <li>
                                <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <h4 class="footer-heading-title">Vivere il comune</h4>
                    <ul class="footer-list">
                        @foreach ($livingLinks as $link)
                            <li>
                                <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-9 mt-md-4 footer-items-wrapper">
                    <h4 class="footer-heading-title">Contatti</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="footer-info">{!! $contactInfoHtml !!}</p>
                        </div>
                        <div class="col-md-4">
                            <ul class="footer-list">
                                @foreach ($contactLinksLeft as $link)
                                    <li>
                                        <a href="{{ $link['url'] }}" @foreach (($link['attributes'] ?? []) as $attribute => $value) {{ $attribute }}="{{ $value }}" @endforeach>{{ $link['label'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="footer-list">
                                @foreach ($contactLinksRight as $link)
                                    <li>
                                        <a href="{{ $link['url'] }}" @foreach (($link['attributes'] ?? []) as $attribute => $value) {{ $attribute }}="{{ $value }}" @endforeach>{{ $link['label'] }}</a>
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
                                <a class="p-1 text-white" href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer">
                                    <svg class="icon icon-sm icon-white align-top">
                                        <use xlink:href="{{ $spriteUrl }}#{{ $social['icon'] }}"></use>
                                    </svg>
                                    <span class="visually-hidden">{{ $social['label'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 footer-items-wrapper">
                    <div class="footer-bottom">
                        @foreach ($footerBottomLinks as $link)
                            <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
