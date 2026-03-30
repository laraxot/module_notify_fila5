{{--
|--------------------------------------------------------------------------
| Footer Slim - Minimal Footer
|--------------------------------------------------------------------------
|
| Structure:
|   Only Bottom Bar (Copyright + Sitemap)
|
| Usage:
|   <x-section slug="footer" tpl="slim" />
|
--}}

<footer class="it-footer it-footer-slim" role="contentinfo">
    
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
                            <a href="/privacy" class="text-white text-decoration-none">Privacy</a>
                        </li>
                        <li class="list-inline-item">|</li>
                        <li class="list-inline-item">
                            <a href="/note-legali" class="text-white text-decoration-none">Note legali</a>
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
/* Slim Footer Styles */
.it-footer-slim {
    font-family: "Titillium Web", Geneva, Tahoma, sans-serif;
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
</style>
@endpush
