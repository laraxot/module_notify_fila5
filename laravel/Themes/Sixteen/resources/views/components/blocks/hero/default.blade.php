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

@props(['title' => '', 'subtitle' => '', 'content' => '', 'background' => 'primary'])

<div class="cmp-hero py-12 {{ $background === 'primary' ? 'bg-primary text-white' : ($background === 'white' ? 'bg-white' : 'bg-gray-100') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <section class="it-hero-wrapper bg-{{ $background === 'white' ? 'white' : '' }} align-items-start">
                    <div class="it-hero-text-wrapper pt-0 ps-0 pb-4 pb-lg-60">
                        @if($title)
                            <h1 class="text-{{ $background === 'white' ? 'black' : ($background === 'primary' ? 'white' : 'gray-900') }}" data-element="page-name">
                                {{ $title }}
                            </h1>
                        @endif
                        
                        @if($subtitle || $content)
                            <div class="hero-text">
                                <p class="{{ $background === 'white' ? '' : ($background === 'primary' ? 'text-white/90' : 'text-gray-600') }}">
                                    {{ $subtitle ?: $content }}
                                </p>
                            </div>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
