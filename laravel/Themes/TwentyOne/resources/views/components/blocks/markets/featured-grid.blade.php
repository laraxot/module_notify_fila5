{{--
    Featured Markets Grid - Mercati Predittivi in Evidenza
    
    @package TwentyOne
    @see _bmad/bmm/2-plan/fixcity-homepage-improvement-prd.json
    
    @var \Illuminate\Support\Collection $markets
--}}
@php
    $markets = $markets ?? [];
@endphp

<section class="relative py-20 bg-slate-950" aria-labelledby="markets-heading">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-900/0 via-slate-900/50 to-slate-950" aria-hidden="true"></div>
    
    <div class="container relative mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <h2 id="markets-heading" class="text-4xl md:text-5xl font-bold text-white mb-4">
                Mercati in <span class="bg-gradient-to-r from-emerald-400 to-cyan-400 bg-clip-text text-transparent">Evidenza</span>
            </h2>
            <p class="text-lg text-slate-400 max-w-2xl mx-auto">
                Esplora i mercati predittivi più popolari e partecipa con le tue previsioni
            </p>
        </div>
        
        {{-- Markets Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            
            @foreach($markets as $market)
                @php
                    $market = (object) $market;
                    $outcomes = $market->outcomes ?? [];
                    $category = $market->category ?? null;
                    $participants = $market->participants ?? 0;
                    $volume = $market->volume ?? 0;
                @endphp
                
                <a href="{{ route('predicts.show', $market->id ?? '#') }}" 
                   class="group block bg-slate-900/50 rounded-xl border border-slate-800 hover:border-emerald-500/50 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg hover:shadow-emerald-500/10 overflow-hidden">
                    
                    {{-- Card Header --}}
                    <div class="p-6 border-b border-slate-800">
                        {{-- Category Badge --}}
                        @if($category)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 mb-3">
                                {{ $category }}
                            </span>
                        @endif
                        
                        {{-- Market Title --}}
                        <h3 class="text-lg font-semibold text-white group-hover:text-emerald-400 transition-colors duration-300 line-clamp-2">
                            {{ $market->title ?? 'Mercato Predittivo' }}
                        </h3>
                    </div>
                    
                    {{-- Outcomes --}}
                    <div class="p-6 space-y-4">
                        @foreach(array_slice($outcomes, 0, 3) as $index => $outcome)
                            @php
                                $outcome = (object) $outcome;
                                $probability = $outcome->probability ?? 0;
                                $label = $outcome->label ?? 'Outcome ' . ($index + 1);
                            @endphp
                            
                            <div class="space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="text-slate-300">{{ $label }}</span>
                                    <span class="text-emerald-400 font-medium">{{ number_format($probability, 1) }}%</span>
                                </div>
                                <div class="relative h-2 bg-slate-800 rounded-full overflow-hidden">
                                    <div class="absolute inset-y-0 left-0 bg-gradient-to-r from-emerald-500 to-cyan-500 rounded-full transition-all duration-500"
                                         style="width: {{ min($probability, 100) }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    {{-- Card Footer --}}
                    <div class="px-6 py-4 bg-slate-800/30 border-t border-slate-800 flex justify-between items-center text-sm">
                        <div class="flex items-center gap-4">
                            <span class="flex items-center text-slate-400">
                                <x-heroicon-o-user class="w-4 h-4 mr-1" />
                                {{ number_format($participants) }}
                            </span>
                            <span class="flex items-center text-slate-400">
                                <x-heroicon-o-currency-dollar class="w-4 h-4 mr-1" />
                                {{ number_format($volume) }}
                            </span>
                        </div>
                        <span class="text-emerald-400 font-medium group-hover:translate-x-1 transition-transform duration-300">
                            Partecipa →
                        </span>
                    </div>
                    
                </a>
            @endforeach
            
        </div>
        
        {{-- View All Link --}}
        <div class="text-center mt-12">
            <a href="{{ route('predicts.index') }}" 
               class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold rounded-lg bg-emerald-500/10 text-emerald-400 hover:bg-emerald-500/20 transition-all duration-300 border border-emerald-500/20">
                <x-heroicon-o-arrow-right class="w-5 h-5 mr-2" />
                Vedi Tutti i Mercati
            </a>
        </div>
        
    </div>
</section>
