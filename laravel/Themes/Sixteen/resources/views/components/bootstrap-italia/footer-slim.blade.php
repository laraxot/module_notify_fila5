{{--
    Bootstrap Italia Slim Footer
    Versione semplificata per pagine interne
--}}

@props([
    'title' => 'Nome del Comune',
    'fiscalCode' => '00123456789',
    'privacyUrl' => '#',
    'legalUrl' => '#',
    'accessibilityUrl' => '#',
])

<footer class="it-footer it-footer-slim" id="footer">
    <div class="it-footer-main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="it-footer-small-prints clearfix">
                        <div class="it-footer-small-prints-left">
                            <div class="it-brand-wrapper">
                                <a href="/it/tests/homepage">
                                    <svg class="icon" aria-hidden="true">
                                        <use xlink:href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-pa"></use>
                                    </svg>
                                    <div class="it-brand-text">
                                        <h2 class="no_toc">{{ $title }}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="it-footer-small-prints-right">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="{{ $privacyUrl }}">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ $legalUrl }}">Note legali</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ $accessibilityUrl }}">Accessibilità</a>
                                </li>
                            </ul>
                            <p class="footer-info">
                                &copy; {{ date('Y') }} {{ $title }} - Tutti i diritti riservati<br>
                                P.IVA: {{ $fiscalCode }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
