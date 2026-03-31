{{-- Hero Section - EXACT Bootstrap Italia Structure --}}
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cmp-hero">
                    <h1 class="title-xxxlarge">NOME DEL COMUNE</h1>
                    <p class="subtitle-small">Un comune da vivere</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Featured Content Section --}}
<section class="card-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cmp-hero-content">
                    <div class="card card-teaser shadow rounded">
                        <div class="card-body">
                            @if(isset($featured_news['image']))
                            <div class="figure mb-3">
                                <img src="{{ $featured_news['image'] }}" alt="{{ $featured_news['title'] }}" class="img-fluid rounded" />
                            </div>
                            @endif
                            
                            <span class="text-muted small">
                                <x-filament::icon icon="heroicon-o-calendar" class="icon icon-sm inline me-1" aria-hidden="true" />
                                {{ $featured_news['date'] ?? '' }}
                            </span>
                            
                            <h3 class="card-title h4 mt-2 mb-3">
                                <a href="{{ $featured_news['url'] ?? '#' }}" class="text-decoration-none text-dark stretched-link">
                                    {{ $featured_news['title'] ?? '' }}
                                </a>
                            </h3>
                            
                            @if(isset($featured_news['excerpt']))
                            <p class="card-text text-gray-700 mb-3">
                                {{ $featured_news['excerpt'] }}
                            </p>
                            @endif
                            
                            <a href="{{ $featured_news['url'] ?? '#' }}" class="read-more text-primary font-weight-bold text-decoration-none">
                                Leggi di più
                                <x-filament::icon icon="heroicon-o-arrow-right" class="icon icon-sm inline ms-1" aria-hidden="true" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Governance Cards Section --}}
<section class="card-wrapper">
    <div class="container">
        <div class="row g-4">
            @foreach($governance_items ?? [] as $item)
            <div class="col-12 col-md-4">
                <div class="card card-bg shadow-sm h-100">
                    <div class="card-body p-4">
                        <h3 class="card-title h5 mb-2">
                            <a href="{{ $item['url'] ?? '#' }}" class="text-decoration-none text-dark stretched-link">
                                {{ $item['title'] ?? '' }}
                            </a>
                        </h3>
                        
                        @if(isset($item['name']))
                        <p class="text-muted mb-3">{{ $item['name'] }}</p>
                        @endif
                        
                        <a href="{{ $item['url'] ?? '#' }}" class="read-more text-primary font-weight-bold text-decoration-none">
                            Vai alla pagina
                            <x-filament::icon icon="heroicon-o-arrow-right" class="icon icon-sm inline ms-1" aria-hidden="true" />
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Events Calendar Section --}}
<section class="it-calendar-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="it-calendar">
                    <div class="calendar-header">
                        <h3 class="h5 mb-0">{{ $calendar_month ?? '' }} {{ $calendar_year ?? '' }}</h3>
                    </div>
                    <div class="calendar-body">
                        <ul class="list-unstyled mb-0">
                            @foreach($calendar_events ?? [] as $event)
                            <li class="border-bottom">
                                <a href="{{ $event['url'] ?? '#' }}" class="d-block p-3 text-decoration-none text-dark hover-bg-light">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold text-primary">{{ $event['date'] ?? '' }}</span>
                                        <span class="text-muted small">{{ $event['title'] ?? '' }}</span>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Topics Highlight Section --}}
<section class="topic-list-wrapper">
    <div class="container">
        <div class="row g-4">
            @foreach($topics ?? [] as $topic)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="topic-card card card-bg shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        @if(isset($topic['icon']))
                        <div class="mb-3">
                            <x-filament::icon icon="ui-brands.{{ $topic['icon'] }}" class="w-12 h-12 text-primary mx-auto" aria-hidden="true" />
                        </div>
                        @endif
                        
                        <h3 class="card-title h5 mb-0">
                            <a href="{{ $topic['url'] ?? '#' }}" class="text-decoration-none text-dark stretched-link">
                                {{ $topic['title'] ?? '' }}
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        @if(isset($show_all_url) && $show_all_url)
        <div class="row mt-4">
            <div class="col-12 text-end">
                <a href="{{ $show_all_url }}" class="btn btn-outline-primary">
                    Altri argomenti
                    <x-filament::icon icon="heroicon-o-arrow-right" class="icon icon-sm inline ms-1" aria-hidden="true" />
                </a>
            </div>
        </div>
        @endif
    </div>
</section>

{{-- Thematic Sites Section --}}
<section class="thematic-sites">
    <div class="container">
        <div class="row g-4">
            @foreach($thematic_sites ?? [] as $site)
            <div class="col-12 col-md-4">
                <div class="card card-bg shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        <h3 class="card-title h5 mb-0">
                            <a href="{{ $site['url'] ?? '#' }}" class="text-decoration-none text-dark stretched-link">
                                {{ $site['title'] ?? '' }}
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Search & Feedback Section --}}
<section class="search-feedback">
    <div class="container">
        <div class="row g-4">
            {{-- Search Bar --}}
            <div class="col-12 col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="h5 mb-3">Cerca nel sito</h3>
                        <form action="#" method="get" class="search-form">
                            <div class="form-group mb-3">
                                <label for="site-search" class="visually-hidden">Cerca una parola chiave</label>
                                <input type="text" id="site-search" class="form-control" placeholder="Cerca una parola chiave" name="q">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <x-filament::icon icon="heroicon-o-magnifying-glass" class="icon icon-sm me-2" aria-hidden="true" />
                                Invio
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            {{-- Feedback Form --}}
            <div class="col-12 col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="h5 mb-3">Valuta la pagina</h3>
                        <form class="feedback-form">
                            <div class="mb-4">
                                <label class="form-label">Quanto sono chiare le informazioni presenti in questo sito?</label>
                                <div class="rating">
                                    @for($i = 1; $i <= 5; $i++)
                                    <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}" class="rating-input">
                                    <label for="star{{ $i }}" class="rating-label">★</label>
                                    @endfor
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Quali aspetti di questo sito pensi di utilizzare più frequentemente?</label>
                                <textarea class="form-control" rows="2"></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Quali difficoltà hai incontrato oggi nel completare le attività su questo sito?</label>
                                <textarea class="form-control" rows="2"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Invia feedback</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Contact & Services Section --}}
<section class="contact-services">
    <div class="container">
        <div class="row g-4">
            {{-- Contact Box --}}
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-teaser shadow-sm h-100">
                    <div class="card-body p-4">
                        <h3 class="h5 mb-3">Contatta il Comune</h3>
                        
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <x-filament::icon icon="heroicon-o-document-text" class="icon icon-sm inline me-2" aria-hidden="true" />
                                    Leggi le FAQ
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <x-filament::icon icon="heroicon-o-lifebuoy" class="icon icon-sm inline me-2" aria-hidden="true" />
                                    Richiedi assistenza
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="tel:061234567" class="text-decoration-none">
                                    <x-filament::icon icon="heroicon-o-phone" class="icon icon-sm inline me-2" aria-hidden="true" />
                                    Chiama il numero verde
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <x-filament::icon icon="heroicon-o-calendar" class="icon icon-sm inline me-2" aria-hidden="true" />
                                    Prenota appuntamento
                                </a>
                            </li>
                        </ul>
                        
                        <a href="#" class="btn btn-outline-primary w-100">Tutti i contatti</a>
                    </div>
                </div>
            </div>
            
            {{-- Reporting Box --}}
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-teaser shadow-sm h-100">
                    <div class="card-body p-4">
                        <h3 class="h5 mb-3">Problemi in città</h3>
                        
                        <p class="text-muted mb-4">Segnala un disservizio o un problema sul territorio</p>
                        
                        <a href="#" class="btn btn-outline-primary w-100">
                            <x-filament::icon icon="heroicon-o-exclamation-triangle" class="icon icon-sm me-2" aria-hidden="true" />
                            Segnala disservizio
                        </a>
                    </div>
                </div>
            </div>
            
            {{-- Quick Links --}}
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-teaser shadow-sm h-100">
                    <div class="card-body p-4">
                        <h3 class="h5 mb-3">Forse stavi cercando</h3>
                        
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none text-primary">
                                    <x-filament::icon icon="heroicon-o-document-arrow-down" class="icon icon-sm inline me-2" aria-hidden="true" />
                                    Rilascio CIE
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none text-primary">
                                    <x-filament::icon icon="heroicon-o-home" class="icon icon-sm inline me-2" aria-hidden="true" />
                                    Cambio di residenza
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none text-primary">
                                    <x-filament::icon icon="heroicon-o-currency-euro" class="icon icon-sm inline me-2" aria-hidden="true" />
                                    Tributi online
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none text-primary">
                                    <x-filament::icon icon="heroicon-o-calendar" class="icon icon-sm inline me-2" aria-hidden="true" />
                                    Prenotazione appuntamenti
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none text-primary">
                                    <x-filament::icon icon="heroicon-o-identification" class="icon icon-sm inline me-2" aria-hidden="true" />
                                    Rilascio tessera elettorale
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
