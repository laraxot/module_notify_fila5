{{--
    Hero Section Cinematografica per Homepage FixCity
    
    @package TwentyOne
    @see _bmad/bmm/2-plan/fixcity-homepage-improvement-prd.json
    @see _bmad/bmm/3-solutioning/fixcity-homepage-architecture.md
--}}
<section class="relative py-20 md:py-32 overflow-hidden" aria-labelledby="hero-heading">
    
    {{-- Background Gradient --}}
    <div class="absolute inset-0 bg-gradient-to-br from-slate-950 via-slate-900 to-emerald-950/20" aria-hidden="true"></div>
    
    {{-- Cinematic Particles --}}
    <div class="absolute inset-0" aria-hidden="true">
        <x-ui.cinematic-particles count="80" />
    </div>
    
    {{-- Content Container --}}
    <div class="container relative mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
        
        {{-- Promotional Badge --}}
        <div class="inline-flex items-center gap-2 px-4 py-2 mb-8 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-sm font-medium animate-kinetic-float">
            <x-heroicon-o-sparkles class="w-4 h-4" />
            <span>La Prima Piattaforma Italiana di Prediction Market</span>
        </div>
        
        {{-- Headline with Gradient --}}
        <h1 id="hero-heading" class="text-5xl md:text-7xl lg:text-8xl font-bold tracking-tight">
            <span class="bg-gradient-to-r from-emerald-400 via-cyan-400 to-emerald-400 bg-clip-text text-transparent animate-gradient">
                Prevedi il Futuro
            </span>
            <br />
            <span class="text-white">Oggi</span>
        </h1>
        
        {{-- Subheadline --}}
        <p class="mt-6 max-w-3xl mx-auto text-lg md:text-2xl text-slate-300 leading-relaxed">
            Esplora i mercati predittivi multi-opzione, confronta le probabilità e partecipa con le tue previsioni.
            <span class="text-emerald-400 font-semibold">Senza soldi reali, solo abilità.</span>
        </p>
        
        {{-- Social Proof Stats --}}
        <div class="grid grid-cols-3 gap-6 max-w-3xl mx-auto mt-12" role="group" aria-label="Statistiche piattaforma">
            <div class="text-center" data-kinetic-counter="{{ $stats['users'] ?? 0 }}" data-kinetic-duration="2000">
                <div class="text-3xl md:text-4xl font-bold text-emerald-400">
                    <span class="counter-value" data-prefix="" data-suffix="+">0</span>
                </div>
                <div class="text-sm md:text-base text-slate-400 mt-1">Utenti Attivi</div>
            </div>
            <div class="text-center" data-kinetic-counter="{{ $stats['predictions'] ?? 0 }}" data-kinetic-duration="2000">
                <div class="text-3xl md:text-4xl font-bold text-cyan-400">
                    <span class="counter-value" data-prefix="" data-suffix="">0</span>
                </div>
                <div class="text-sm md:text-base text-slate-400 mt-1">Previsioni</div>
            </div>
            <div class="text-center" data-kinetic-counter="{{ $stats['markets'] ?? 0 }}" data-kinetic-duration="2000">
                <div class="text-3xl md:text-4xl font-bold text-emerald-400">
                    <span class="counter-value" data-prefix="" data-suffix="">0</span>
                </div>
                <div class="text-sm md:text-base text-slate-400 mt-1">Mercati</div>
            </div>
        </div>
        
        {{-- CTA Buttons --}}
        <div class="flex flex-col sm:flex-row gap-4 justify-center mt-12">
            <a href="{{ route('predicts.index') }}" 
               class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold rounded-lg bg-emerald-500 text-white hover:bg-emerald-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-emerald-500/25">
                <x-heroicon-o-chart-bar class="w-5 h-5 mr-2" />
                Esplora Mercati
            </a>
            <a href="{{ route('register') }}" 
               class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold rounded-lg bg-white/10 text-white hover:bg-white/20 transition-all duration-300 backdrop-blur-sm border border-white/20">
                <x-heroicon-o-user-plus class="w-5 h-5 mr-2" />
                Inizia Ora
            </a>
        </div>
        
    </div>
</section>
