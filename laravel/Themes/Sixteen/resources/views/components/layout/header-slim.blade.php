{{-- Header Slim - Bootstrap Italia Style - CORRETTO --}}
{{-- Reference: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html --}}
{{-- Colori: #0066CC (Primary Blue), #FFFFFF (White) --}}

<div class="it-header-slim-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="it-header-slim">
                    <div class="it-header-slim-content">
                        {{-- Left: Region Name --}}
                        <div class="it-header-slim-left">
                            <span class="it-header-slim-region">
                                <a href="#" class="text-decoration-none">
                                    Nome della Regione
                                </a>
                            </span>
                        </div>
                        
                        {{-- Right: Language + Login --}}
                        <div class="it-header-slim-right">
                            {{-- Language Switcher --}}
                            <div class="it-header-slim-language">
                                <span class="it-header-slim-language-label">Lingua attiva:</span>
                                <a href="#" class="it-header-slim-language-active">ITA</a>
                                <span class="it-header-slim-language-separator">/</span>
                                <a href="#" class="it-header-slim-language-item">ENG</a>
                            </div>
                            
                            {{-- Login Button --}}
                            <a href="{{ route('login') }}" class="it-header-slim-login">
                                <svg class="icon icon-xs">
                                    <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-user"></use>
                                </svg>
                                <span>Accedi all'area personale</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Header Slim - Bootstrap Italia Colors */
.it-header-slim-wrapper {
    background-color: #0066CC; /* Primary Blue Bootstrap Italia */
}

.it-header-slim {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}

.it-header-slim-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
}

.it-header-slim-left a {
    color: #FFFFFF;
    font-family: 'Titillium Web', sans-serif;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
}

.it-header-slim-left a:hover {
    color: #FFFFFF;
    text-decoration: underline;
}

.it-header-slim-right {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.it-header-slim-language {
    color: #FFFFFF;
    font-family: 'Titillium Web', sans-serif;
    font-size: 14px;
    font-weight: 400;
}

.it-header-slim-language-label {
    margin-right: 0.5rem;
    opacity: 0.9;
}

.it-header-slim-language-active {
    color: #FFFFFF;
    font-weight: 700;
    text-decoration: none;
}

.it-header-slim-language-separator {
    margin: 0 0.25rem;
    opacity: 0.7;
}

.it-header-slim-language-item {
    color: #FFFFFF;
    opacity: 0.7;
    text-decoration: none;
}

.it-header-slim-language-item:hover {
    opacity: 1;
}

.it-header-slim-login {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background-color: #FFFFFF;
    color: #0066CC;
    padding: 0.375rem 0.75rem;
    border-radius: 0.25rem;
    font-family: 'Titillium Web', sans-serif;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
}

.it-header-slim-login:hover {
    background-color: #F0F0F0;
    color: #0052A3;
    text-decoration: none;
}

.it-header-slim-login .icon {
    width: 16px;
    height: 16px;
}

/* Responsive */
@media (max-width: 768px) {
    .it-header-slim-content {
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .it-header-slim-right {
        flex-direction: column;
        gap: 0.75rem;
    }
}
</style>
