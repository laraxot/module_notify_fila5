{{-- Events Calendar - Tailwind CSS --}}
{{-- Reference: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html --}}
@props([
    'title' => 'Eventi',
    'month' => '',
    'items' => [],
])

<section class="py-12 md:py-16">
    <div class="container mx-auto px-4">
        {{-- Header --}}
        <div class="mb-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                        {{ $title }}
                    </h2>
                    @if($month)
                    <h3 class="text-lg text-gray-600 dark:text-gray-400">
                        {{ $month }}
                    </h3>
                    @endif
                </div>
            </div>
        </div>
        
        {{-- Calendar List --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700">
            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($items as $day)
                <div class="p-4 md:p-6">
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:w-20 flex-shrink-0 text-center md:text-left">
                            <span class="block text-2xl font-bold text-primary-600 dark:text-primary-400">
                                {{ $day['day'] ?? '' }}
                            </span>
                            <span class="block text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                                {{ $day['weekday'] ?? '' }}
                            </span>
                        </div>
                        <div class="flex-1">
                            <ul class="space-y-2">
                                @forelse($day['events'] ?? [] as $event)
                                <li>
                                    <a href="{{ $event['url'] ?? '#' }}" 
                                       class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                                        {{ $event['title'] ?? '' }}
                                    </a>
                                </li>
                                @empty
                                <li class="text-gray-400 italic">Nessun evento</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        {{-- Vai al calendario --}}
        <div class="text-center mt-8">
            <a href="/it/eventi" 
               class="inline-flex items-center px-6 py-3 border border-primary-600 text-primary-600 font-medium rounded-lg hover:bg-primary-50 dark:hover:bg-primary-900 transition-colors">
                Vai al calendario eventi
                <svg class="w-4 h-4 ms-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</section>
