{{-- Governance Cards Block - Tailwind CSS --}}
{{-- Reference: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html --}}
@props([
    'title' => 'Organi di governo',
    'items' => [],
])

<section class="py-12 md:py-16 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-white mb-10">
            {{ $title }}
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($items as $item)
            
            @if(!empty($item['image']))
            {{-- Card con immagine (es. Sindaco) --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden h-full">
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <div class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase mb-2 tracking-wide">
                                {{ $item['category'] ?? $title }}
                            </div>
                            @if(!empty($item['name']))
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                {{ $item['name'] }}
                            </h3>
                            @endif
                            @if(!empty($item['title']))
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                                {{ $item['title'] }}
                            </p>
                            @endif
                            <a href="{{ $item['url'] ?? '#' }}" 
                               class="inline-flex items-center text-primary-600 hover:text-primary-700 dark:text-primary-400 dark:hover:text-primary-300 text-sm font-medium transition-colors">
                                Vai alla pagina
                                <svg class="w-4 h-4 ms-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                        @if(!empty($item['image']))
                        <div class="sm:w-24 flex-shrink-0">
                            <img src="{{ $item['image'] }}" 
                                 alt="{{ $item['name'] ?? $item['title'] ?? '' }}" 
                                 class="w-full h-auto rounded-lg object-cover" />
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            @else
            {{-- Card senza immagine (es. Giunta, Consiglio) --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden h-full">
                <div class="p-6">
                    <div class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase mb-2 tracking-wide">
                        {{ $item['category'] ?? $title }}
                    </div>
                    @if(!empty($item['title']))
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                        {{ $item['title'] }}
                    </h3>
                    @endif
                    @if(!empty($item['description']))
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        {{ $item['description'] }}
                    </p>
                    @endif
                    <a href="{{ $item['url'] ?? '#' }}" 
                       class="inline-flex items-center text-primary-600 hover:text-primary-700 dark:text-primary-400 dark:hover:text-primary-300 text-sm font-medium transition-colors">
                        Vai alla pagina
                        <svg class="w-4 h-4 ms-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endif
            
            @endforeach
        </div>
    </div>
</section>
