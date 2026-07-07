@props(['title' => 'Benvenuto nel Comune', 'subtitle' => 'Portale dei servizi digitali', 'image' => null, 'cta' => null])

{{--
    Hero Block - Homepage
    
    Usage:
    "view": "pub_theme::components.blocks.hero.homepage",
    "title": "Benvenuto nel Comune",
    "subtitle": "Portale dei servizi digitali",
    "image": "/themes/Sixteen/images/hero-homepage.jpg",
    "cta": {
        "label": "Scopri i servizi",
        "url": "/it/servizi"
    }
    
    Docs: docs/design-comuni/blocks/00-index.md
--}}

<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="hero-content">
                    @if($image)
                        <div class="hero-image">
                            <img src="{{ $image }}" alt="{{ $title }}" class="img-fluid">
                        </div>
                    @endif
                    
                    <div class="hero-text">
                        <h1 class="hero-title">{{ $title }}</h1>
                        @if($subtitle)
                            <p class="hero-subtitle">{{ $subtitle }}</p>
                        @endif
                        
                        @if($cta)
                            <a href="{{ $cta['url'] }}" class="btn btn-primary">
                                {{ $cta['label'] }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
