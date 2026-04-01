{{--
    Hero Block - Universal reusable component
    
    USAGE:
    <x-pub_theme::components.blocks.hero.default title="Benvenuto" subtitle="Homepage" />
    
    BLOCK TYPE: hero (UNIVERSAL, NOT page-specific)
    VIEW: pub_theme::components.blocks.hero.default
    
    VARIANTS:
    - default: Simple hero with title and subtitle
    - homepage: Hero with image and CTA
    - with-image: Hero with background image
    - with-video: Hero with video background
    
    INSPIRED BY:
    - https://flowbite.com/blocks/
    - https://tailwindcss.com/plus/ui-blocks
--}}

@props(['title' => '', 'subtitle' => '', 'background' => 'primary'])

<div class="cmp-hero py-12 {{ $background === 'primary' ? 'bg-primary text-white' : 'bg-gray-100' }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if($title)
                    <h1 class="title-xxxlarge mb-4 {{ $background === 'primary' ? 'text-white' : 'text-gray-900' }}">
                        {{ $title }}
                    </h1>
                @endif
                
                @if($subtitle)
                    <p class="subtitle-small {{ $background === 'primary' ? 'text-white/90' : 'text-gray-600' }}">
                        {{ $subtitle }}
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
