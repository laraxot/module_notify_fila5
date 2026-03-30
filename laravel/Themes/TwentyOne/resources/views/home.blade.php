<div>
    {{--
        FixCity Homepage - Cinematic Improvement
        @see _bmad/bmm/2-plan/fixcity-homepage-improvement-prd.json
        @see _bmad/bmm/3-solutioning/fixcity-homepage-architecture.md
    --}}
    
    {{-- Hero Section Cinematografica --}}
    @include('pub_theme::components.blocks.hero.cinematic-homepage')
    
    {{-- Trust Bar con Statistiche --}}
    @include('pub_theme::components.blocks.trust.bar')
    
    {{-- Featured Markets Grid --}}
    @include('pub_theme::components.blocks.markets.featured-grid')
    
    {{-- CMS Content (container0/slug0 pattern) --}}
    <x-page side="content" slug="home" />
    
    {{-- Footer Cinematico --}}
    @include('pub_theme::components.sections.footer')
</div>
