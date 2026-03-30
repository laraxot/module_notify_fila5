@props(['data' => []])

<header class="text-white" role="banner">
    {{-- Top Bar --}}
    <div class="h-10 min-h-10 border-b" style="background-color: var(--agid-primary-dark, #003366); border-color: rgba(255,255,255,0.2);">
        <div class="flex items-center justify-between w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Left: Region Link --}}
            <div class="flex items-center gap-3">
                <a class="text-xs font-medium hover:text-opacity-90 transition focus:outline-2 focus:outline-white focus:outline-offset-2" 
                   href="{{ $data['region_url'] ?? '/it' }}" 
                   aria-label="Vai al portale della Regione">
                    {{ $data['region_name'] ?? 'Regione Example' }}
                </a>
            </div>
            
            {{-- Right: Tools --}}
            <div class="flex items-center gap-4">
                {{-- Dark Mode Toggle --}}
                @if($data['show_dark_mode'] ?? true)
                    <livewire:dark-mode-switcher />
                @endif
                
                {{-- Language Switcher --}}
                @if($data['show_language'] ?? true)
                    <livewire:lang.switcher />
                @endif
                
                {{-- Login Link --}}
                @if($data['show_login'] ?? true)
                    @auth
                        <a href="{{ route('profile') }}" class="text-sm font-medium hover:underline">
                            {{ auth()->user()->name }}
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium hover:underline">
                            Accedi
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </div>
    
    {{-- Main Header --}}
    @if(isset($data['main']))
        <div class="bg-white border-b">
            <div class="max-w-screen-xl mx-auto px-4 py-4">
                {{-- Logo --}}
                @if($data['main']['logo'] ?? null)
                    <div class="py-2">
                        <img src="{{ $data['main']['logo'] }}" alt="{{ $data['main']['logo_alt'] ?? 'Logo' }}" class="h-12" />
                    </div>
                @endif
                
                {{-- Navigation --}}
                @if($data['main']['navigation'] ?? null)
                    <nav class="main-navigation" aria-label="Navigazione principale">
                        <ul class="flex flex-wrap gap-4 md:gap-6 text-sm">
                            @foreach($data['main']['navigation'] as $item)
                                <li>
                                    <a href="{{ $item['url'] }}" 
                                       class="inline-block py-2 px-1 border-b-2 {{ ($item['active'] ?? false) ? 'border-primary font-bold text-primary' : 'border-transparent hover:border-gray-300' }}">
                                        {{ $item['label'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                @endif
                
                {{-- Search Bar --}}
                @if($data['main']['search_enabled'] ?? false)
                    <div class="search-bar py-4">
                        <form action="{{ route('search') }}" method="GET" class="flex gap-2">
                            <input type="text" 
                                   name="q" 
                                   placeholder="Cerca nel sito..." 
                                   class="flex-1 border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                                   aria-label="Cerca" />
                            <button type="submit" class="px-4 py-2 bg-primary text-white rounded hover:bg-primary-dark" aria-label="Cerca">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    @endif
</header>
