@props(['data' => []])

{{-- 
    Enhanced Header Component - Design Comuni Style
    Usage: <x-blocks.header-enhanced :data="$headerData" />
    
    Data structure:
    - city_name: string
    - tagline: string
    - logo_url: string
    - social_links: array
    - search_action: string
    - login_url: string
--}}

@php
    $cityName = $data['city_name'] ?? 'Nome del Comune';
    $tagline = $data['tagline'] ?? 'Un comune da vivere';
    $logoUrl = $data['logo_url'] ?? asset('themes/Sixteen/images/logo-comune.svg');
    $socialLinks = $data['social_links'] ?? [
        ['platform' => 'twitter', 'url' => '#', 'icon' => 'ui-brands.twitter'],
        ['platform' => 'facebook', 'url' => '#', 'icon' => 'ui-brands.facebook'],
        ['platform' => 'youtube', 'url' => '#', 'icon' => 'ui-brands.youtube'],
        ['platform' => 'whatsapp', 'url' => '#', 'icon' => 'ui-brands.whatsapp'],
    ];
    $searchAction = $data['search_action'] ?? '/it/tests/risultati-ricerca';
    $loginUrl = $data['login_url'] ?? '/it/tests/auth/login';
@endphp

<div class="it-header-center-wrapper bg-white border-bottom">
    <div class="container">
        <div class="row align-items-center py-4">
            {{-- Logo & City Info --}}
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center gap-3">
                    <img src="{{ $logoUrl }}" alt="{{ $cityName }}" class="h-16 w-auto" />
                    <div>
                        <h1 class="h5 font-weight-bold mb-0 text-primary">{{ $cityName }}</h1>
                        <p class="text-sm text-gray-600 mb-0">{{ $tagline }}</p>
                    </div>
                </div>
            </div>
            
            {{-- Search Bar --}}
            <div class="col-lg-4 col-md-6">
                <form action="{{ $searchAction }}" method="GET" class="search-form">
                    <div class="input-group">
                        <input 
                            type="text" 
                            name="q" 
                            class="form-control" 
                            placeholder="Cerca nel sito..."
                            aria-label="Cerca"
                        />
                        <button class="btn btn-primary" type="submit">
                            <x-filament::icon icon="heroicon-m-magnifying-glass" class="w-5 h-5" />
                        </button>
                    </div>
                </form>
            </div>
            
            {{-- Social & Login --}}
            <div class="col-lg-4 col-md-12 mt-3 mt-lg-0">
                <div class="d-flex justify-content-end align-items-center gap-3">
                    {{-- Social Links --}}
                    <div class="social-links d-flex gap-2">
                        @foreach($socialLinks as $social)
                        <a 
                            href="{{ $social['url'] }}" 
                            class="text-primary hover:text-primary-dark transition-colors"
                            aria-label="{{ ucfirst($social['platform']) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <x-filament::icon :icon="$social['icon']" class="w-5 h-5" />
                        </a>
                        @endforeach
                        <a href="#" class="text-primary hover:text-primary-dark transition-colors" aria-label="RSS">
                            <x-filament::icon icon="heroicon-o-rss" class="w-5 h-5" />
                        </a>
                    </div>
                    
                    {{-- Login Button --}}
                    <a href="{{ $loginUrl }}" class="btn btn-primary btn-sm px-4">
                        <x-filament::icon icon="heroicon-m-user" class="w-4 h-4 mr-2" />
                        Accedi
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
