{{-- Header Slim - Bootstrap Italia Style --}}
{{-- Reference: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html --}}

<div class="header-slim bg-primary text-white py-2">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            {{-- Left: Region Name --}}
            <span class="header-slim-region small fw-semibold">
                Nome della Regione
            </span>
            
            {{-- Right: Language + Login --}}
            <div class="d-flex align-items-center gap-3">
                {{-- Language Switcher --}}
                <div class="header-slim-language">
                    <span class="small me-2">Lingua attiva:</span>
                    <a href="#" class="text-white fw-bold text-decoration-none">ITA</a>
                    <span class="mx-1">/</span>
                    <a href="#" class="text-white-50 text-decoration-none">ENG</a>
                </div>
                
                {{-- Login Button --}}
                <a href="{{ route('login') }}" class="btn btn-sm btn-light text-primary">
                    <svg class="icon icon-xs me-1" aria-hidden="true">
                        <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-user"></use>
                    </svg>
                    Accedi all'area personale
                </a>
            </div>
        </div>
    </div>
</div>
