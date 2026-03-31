{{-- Design Comuni Header - Pure Tailwind CSS --}}
{{-- Reference: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html --}}
{{-- Exact replication with Tailwind CSS only --}}

<header class="bg-white shadow-sm">
    {{-- TOP BAR - Regione + Login --}}
    <div class="bg-[#0066CC] text-white py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                {{-- Left: Regione --}}
                <a href="#" class="text-white text-sm font-semibold hover:underline no-underline">
                    Nome della Regione
                </a>
                
                {{-- Right: Language + Login --}}
                <div class="flex items-center gap-4">
                    {{-- Language --}}
                    <div class="text-white text-sm flex items-center gap-2">
                        <span class="opacity-90">Lingua attiva:</span>
                        <span class="font-bold">ITA</span>
                        <span class="opacity-70">/</span>
                        <a href="#" class="opacity-70 hover:opacity-100 no-underline">ENG</a>
                    </div>
                    
                    {{-- Login --}}
                    <a href="{{ route('login') }}" 
                       class="inline-flex items-center gap-2 bg-white text-[#0066CC] px-4 py-1.5 rounded text-sm font-semibold no-underline hover:bg-[#F0F0F0] transition-colors">
                        <svg class="w-4 h-4" aria-hidden="true">
                            <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-user"></use>
                        </svg>
                        <span class="hidden sm:inline">Accedi all'area personale</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    {{-- MAIN HEADER - Logo + Comune Name + Search + Social --}}
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                {{-- Left: Logo + Comune --}}
                <a href="/" class="flex items-center gap-4 no-underline group">
                    {{-- Logo PA --}}
                    <div class="w-20 h-20 flex items-center justify-center">
                        <svg class="w-full h-full text-[#0066CC]" aria-hidden="true">
                            <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-pa"></use>
                        </svg>
                    </div>
                    
                    {{-- Comune Name + Slogan --}}
                    <div class="flex flex-col">
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 m-0 group-hover:text-[#0066CC] transition-colors">
                            NOME DEL COMUNE
                        </h1>
                        <p class="text-base text-gray-600 m-0 mt-1">
                            Un comune da vivere
                        </p>
                    </div>
                </a>
                
                {{-- Right: Search + Social --}}
                <div class="flex flex-col items-end gap-3">
                    {{-- Search --}}
                    <form class="w-full max-w-xs">
                        <div class="relative">
                            <input type="text" 
                                   placeholder="Cerca nel sito" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-[#0066CC] focus:border-transparent" />
                            <button type="submit" 
                                    class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#0066CC]">
                                <svg class="w-5 h-5" aria-hidden="true">
                                    <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-search"></use>
                                </svg>
                            </button>
                        </div>
                    </form>
                    
                    {{-- Social Icons --}}
                    <div class="flex items-center gap-2">
                        <span class="text-xs text-gray-500 font-semibold">Seguici su</span>
                        <a href="#" class="text-gray-600 hover:text-[#0066CC] transition-colors" aria-label="Twitter">
                            <svg class="w-5 h-5" aria-hidden="true">
                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-twitter"></use>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-[#0066CC] transition-colors" aria-label="Facebook">
                            <svg class="w-5 h-5" aria-hidden="true">
                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-facebook"></use>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-[#0066CC] transition-colors" aria-label="YouTube">
                            <svg class="w-5 h-5" aria-hidden="true">
                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-youtube"></use>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-[#0066CC] transition-colors" aria-label="Telegram">
                            <svg class="w-5 h-5" aria-hidden="true">
                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-telegram"></use>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-[#0066CC] transition-colors" aria-label="Whatsapp">
                            <svg class="w-5 h-5" aria-hidden="true">
                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-whatsapp"></use>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-[#0066CC] transition-colors" aria-label="RSS">
                            <svg class="w-5 h-5" aria-hidden="true">
                                <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-rss"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- NAVIGATION BAR --}}
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                {{-- Comune Name (repeated in nav) --}}
                <div class="hidden lg:block">
                    <h2 class="text-lg font-bold text-gray-900">NOME DEL COMUNE</h2>
                </div>
                
                {{-- Main Menu --}}
                <div class="flex items-center gap-1">
                    <a href="/it/amministrazione" 
                       class="px-4 py-3 text-sm font-semibold text-gray-700 hover:text-[#0066CC] hover:bg-gray-50 no-underline transition-colors">
                        Amministrazione
                    </a>
                    <a href="/it/novita" 
                       class="px-4 py-3 text-sm font-semibold text-gray-700 hover:text-[#0066CC] hover:bg-gray-50 no-underline transition-colors">
                        Novità
                    </a>
                    <a href="/it/servizi" 
                       class="px-4 py-3 text-sm font-semibold text-gray-700 hover:text-[#0066CC] hover:bg-gray-50 no-underline transition-colors">
                        Servizi
                    </a>
                    <a href="/it/vivere" 
                       class="px-4 py-3 text-sm font-semibold text-gray-700 hover:text-[#0066CC] hover:bg-gray-50 no-underline transition-colors">
                        Vivere il Comune
                    </a>
                </div>
                
                {{-- Mobile Menu Toggle --}}
                <button class="lg:hidden p-2 text-gray-600 hover:text-[#0066CC]" aria-label="Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>
</header>
