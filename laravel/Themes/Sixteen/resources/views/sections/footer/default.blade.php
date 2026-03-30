{{--
|--------------------------------------------------------------------------
| Footer Default - Design Comuni Complete
|--------------------------------------------------------------------------
|
| Structure:
|   1. Pre-Footer (Contact, Problems, Search, Suggestions)
|   2. Main Footer (Brand, Services, News, Contacts, Legal, Social)
|   3. Bottom Bar (Copyright, Made by, Sitemap)
|
| Usage:
|   <x-section slug="footer" tpl="default" />
|   <x-section slug="footer" /> (default)
|
--}}

<footer class="it-footer" role="contentinfo">
    
    {{-- ============================================
        SECTION 1: PRE-FOOTER
        4 columns: Contatta | Problemi | Cerca | Forse stavi cercando
        ============================================ --}}
    <div class="it-footer-contact-wrapper bg-light py-5">
        <div class="container">
            <div class="row g-4">
                
                {{-- Column 1: Contatta --}}
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="it-footer-contact-box">
                        <h4 class="h5 mb-3">
                            <svg class="icon icon-primary me-2" aria-hidden="true">
                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-mail"></use>
                            </svg>
                            Contatta
                        </h4>
                        <ul class="link-list">
                            <li>
                                <a class="list-item" href="/faq">
                                    <span>Leggi le domande frequenti</span>
                                </a>
                            </li>
                            <li>
                                <a class="list-item" href="/assistenza">
                                    <span>Richiedi assistenza</span>
                                </a>
                            </li>
                            <li>
                                <a class="list-item" href="/telefono">
                                    <span>Chiama il numero verde</span>
                                </a>
                            </li>
                            <li>
                                <a class="list-item" href="/appuntamenti">
                                    <span>Prenota appuntamento</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                {{-- Column 2: Problemi --}}
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="it-footer-contact-box">
                        <h4 class="h5 mb-3">
                            <svg class="icon icon-primary me-2" aria-hidden="true">
                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-warning"></use>
                            </svg>
                            Problemi?
                        </h4>
                        <ul class="link-list">
                            <li>
                                <a class="list-item" href="/it/tests/argomenti">
                                    <span>Segnala disservizio</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                {{-- Column 3: Cerca --}}
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="it-footer-contact-box">
                        <h4 class="h5 mb-3">
                            <svg class="icon icon-primary me-2" aria-hidden="true">
                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-search"></use>
                            </svg>
                            Cerca
                        </h4>
                        <form role="search" action="/cerca" method="get">
                            <div class="form-group">
                                <label for="footer-search" class="visually-hidden">Cerca nel sito</label>
                                <input type="search" 
                                       class="form-control" 
                                       id="footer-search" 
                                       placeholder="Cerca..." 
                                       name="q" />
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mt-2">
                                <svg class="icon icon-sm">
                                    <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-search"></use>
                                </svg>
                                Cerca
                            </button>
                        </form>
                    </div>
                </div>
                
                {{-- Column 4: Forse stavi cercando --}}
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="it-footer-contact-box">
                        <h4 class="h5 mb-3">
                            <svg class="icon icon-primary me-2" aria-hidden="true">
                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-info-circle"></use>
                            </svg>
                            Forse stavi cercando?
                        </h4>
                        <ul class="link-list">
                            <li>
                                <a class="list-item" href="/cie">
                                    <span>Rilascio CIE</span>
                                </a>
                            </li>
                            <li>
                                <a class="list-item" href="/residenza">
                                    <span>Cambio di residenza</span>
                                </a>
                            </li>
                            <li>
                                <a class="list-item" href="/tributi">
                                    <span>Tributi online</span>
                                </a>
                            </li>
                            <li>
                                <a class="list-item" href="/appuntamenti">
                                    <span>Prenotazione appuntamenti</span>
                                </a>
                            </li>
                            <li>
                                <a class="list-item" href="/elettorale">
                                    <span>Rilascio tessera elettorale</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    {{-- ============================================
        SECTION 2: MAIN FOOTER
        4 columns: Brand+Admin | Servizi | Novità+Vivere | Contatti+Legal+Social
        ============================================ --}}
    <div class="it-footer-main bg-dark text-white py-5">
        <div class="container">
            <div class="row g-4">
                
                {{-- Column 1: Brand + Amministrazione --}}
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="it-brand-wrapper mb-4">
                        <a href="/" class="text-white text-decoration-none">
                            <svg width="82" height="82" class="icon" aria-hidden="true">
                                <image xlink:href="/themes/sixteen/images/stemma-comune.svg"/>
                            </svg>
                            <div class="it-brand-text">
                                <div class="it-brand-title h4">Comune di FixCity</div>
                                <div class="it-brand-tagline small">Città Metropolitana</div>
                            </div>
                        </a>
                    </div>
                    
                    <h4 class="h5 mt-4 mb-3">Amministrazione</h4>
                    <ul class="link-list">
                        <li><a class="list-item text-white" href="/amministrazione">Organi di governo</a></li>
                        <li><a class="list-item text-white" href="/aree">Aree amministrative</a></li>
                        <li><a class="list-item text-white" href="/uffici">Uffici</a></li>
                        <li><a class="list-item text-white" href="/enti">Enti e fondazioni</a></li>
                        <li><a class="list-item text-white" href="/politici">Politici</a></li>
                        <li><a class="list-item text-white" href="/personale">Personale amministrativo</a></li>
                        <li><a class="list-item text-white" href="/documenti">Documenti e dati</a></li>
                    </ul>
                </div>
                
                {{-- Column 2: Servizi --}}
                <div class="col-12 col-md-6 col-lg-3">
                    <h4 class="h5 mb-3">Servizi</h4>
                    <ul class="link-list">
                        <li><a class="list-item text-white" href="/anagrafe">Anagrafe e stato civile</a></li>
                        <li><a class="list-item text-white" href="/cultura">Cultura e tempo libero</a></li>
                        <li><a class="list-item text-white" href="/lavoro">Vita lavorativa</a></li>
                        <li><a class="list-item text-white" href="/imprese">Imprese e commercio</a></li>
                        <li><a class="list-item text-white" href="/appalti">Appalti pubblici</a></li>
                        <li><a class="list-item text-white" href="/catasto">Catasto e urbanistica</a></li>
                        <li><a class="list-item text-white" href="/turismo">Turismo</a></li>
                        <li><a class="list-item text-white" href="/mobilita">Mobilità e trasporti</a></li>
                        <li><a class="list-item text-white" href="/educazione">Educazione e formazione</a></li>
                        <li><a class="list-item text-white" href="/giustizia">Giustizia e sicurezza</a></li>
                        <li><a class="list-item text-white" href="/tributi">Tributi e contravvenzioni</a></li>
                        <li><a class="list-item text-white" href="/ambiente">Ambiente</a></li>
                        <li><a class="list-item text-white" href="/salute">Salute e assistenza</a></li>
                        <li><a class="list-item text-white" href="/autorizzazioni">Autorizzazioni</a></li>
                        <li><a class="list-item text-white" href="/agricoltura">Agricoltura e pesca</a></li>
                    </ul>
                </div>
                
                {{-- Column 3: Novità + Vivere --}}
                <div class="col-12 col-md-6 col-lg-3">
                    <h4 class="h5 mb-3">Novità</h4>
                    <ul class="link-list">
                        <li><a class="list-item text-white" href="/notizie">Notizie</a></li>
                        <li><a class="list-item text-white" href="/comunicati">Comunicati</a></li>
                        <li><a class="list-item text-white" href="/avvisi">Avvisi</a></li>
                    </ul>
                    
                    <h4 class="h5 mt-4 mb-3">Vivere il Comune</h4>
                    <ul class="link-list">
                        <li><a class="list-item text-white" href="/luoghi">Luoghi</a></li>
                        <li><a class="list-item text-white" href="/eventi">Eventi</a></li>
                    </ul>
                </div>
                
                {{-- Column 4: Contatti + Legal + Social --}}
                <div class="col-12 col-md-6 col-lg-3">
                    <h4 class="h5 mb-3">Contatti</h4>
                    <address class="mb-3">
                        <p class="mb-1"><strong>Comune di FixCity</strong></p>
                        <p class="mb-1">Via Roma, 1</p>
                        <p class="mb-1">00100 FixCity (FC)</p>
                        <p class="mb-1">Tel: 06 1234567</p>
                        <p class="mb-1">Email: info@fixcity.gov.it</p>
                        <p class="mb-1">PEC: comune@pec.fixcity.gov.it</p>
                    </address>
                    
                    <h4 class="h5 mt-4 mb-3">Link Istituzionali</h4>
                    <ul class="link-list">
                        <li><a class="list-item text-white" href="/trasparenza">Amministrazione trasparente</a></li>
                        <li><a class="list-item text-white" href="/privacy">Informativa privacy</a></li>
                        <li><a class="list-item text-white" href="/note-legali">Note legali</a></li>
                        <li><a class="list-item text-white" href="/accessibilita">Dichiarazione di accessibilità</a></li>
                    </ul>
                    
                    <h4 class="h5 mt-4 mb-3">Seguici su</h4>
                    <div class="it-socials">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="text-white" aria-label="Twitter">
                                    <svg class="icon icon-sm icon-white">
                                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-twitter"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-white" aria-label="Facebook">
                                    <svg class="icon icon-sm icon-white">
                                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-facebook"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-white" aria-label="YouTube">
                                    <svg class="icon icon-sm icon-white">
                                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-youtube"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-white" aria-label="Telegram">
                                    <svg class="icon icon-sm icon-white">
                                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-telegram"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-white" aria-label="Whatsapp">
                                    <svg class="icon icon-sm icon-white">
                                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-whatsapp"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-white" aria-label="RSS">
                                    <svg class="icon icon-sm icon-white">
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
    
    {{-- ============================================
        SECTION 3: BOTTOM BAR
        Copyright | Made by | Sitemap
        ============================================ --}}
    <div class="it-footer-bottom bg-darker text-white py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 text-center text-md-start mb-2 mb-md-0">
                    <p class="mb-0 small">
                        &copy; {{ date('Y') }} Comune di FixCity - Tutti i diritti riservati
                    </p>
                    <p class="mb-0 small">
                        P.IVA: 00000000000 - Codice Fiscale: 00000000000
                    </p>
                </div>
                <div class="col-12 col-md-6 text-center text-md-end">
                    <ul class="list-inline mb-0 small">
                        <li class="list-inline-item">
                            <a href="/media-policy" class="text-white text-decoration-none">Media policy</a>
                        </li>
                        <li class="list-inline-item">|</li>
                        <li class="list-inline-item">
                            <a href="/mappa" class="text-white text-decoration-none">Mappa del sito</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</footer>

@push('styles')
<style>
/* Footer Styles - Bootstrap Italia compliant */
.it-footer {
    font-family: "Titillium Web", Geneva, Tahoma, sans-serif;
}

.it-footer-contact-wrapper {
    border-bottom: 1px solid #dee2e6;
}

.it-footer-contact-box h4 {
    font-weight: 600;
    color: #007a52;
}

.it-footer-contact-box .link-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.it-footer-contact-box .link-list .list-item {
    display: block;
    padding: 0.5rem 0;
}

.it-footer-contact-box .link-list .list-item a {
    color: #17334f;
    text-decoration: none;
}

.it-footer-contact-box .link-list .list-item a:hover {
    color: #007a52;
    text-decoration: underline;
}

.it-footer-main {
    background-color: #17334f;
}

.it-footer-main .link-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.it-footer-main .link-list .list-item {
    display: block;
    padding: 0.25rem 0;
}

.it-footer-main .link-list .list-item a {
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    transition: color 0.2s;
}

.it-footer-main .link-list .list-item a:hover {
    color: #ffffff;
    text-decoration: underline;
}

.it-footer-main address {
    font-style: normal;
    line-height: 1.6;
}

.it-socials ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.it-socials .list-inline-item:not(:last-child) {
    margin-right: 0.75rem;
}

.it-footer-bottom {
    background-color: #0f2338;
    font-size: 0.875rem;
}

.it-footer-bottom a {
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
}

.it-footer-bottom a:hover {
    color: #ffffff;
    text-decoration: underline;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .it-footer-main .row {
        margin-bottom: 2rem;
    }
}
</style>
@endpush
