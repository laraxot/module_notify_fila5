@props([
    'title' => '',
    'cards' => [],
    'columns' => 4
])

<section class="cards-block py-12 bg-white">
    <div class="container mx-auto px-4">
        @if($title)
            <h2 class="text-3xl font-bold mb-8 text-center text-gray-900">
                {{ $title }}
            </h2>
        @endif
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-{{ $columns }} gap-6">
            @foreach($cards as $card)
                <a href="{{ $card['url'] ?? '#' }}" class="card group block bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-200 transform hover:-translate-y-1 border border-gray-200 overflow-hidden">
                    <div class="card-body p-6">
                        @if(isset($card['icon']))
                            <div class="mb-4">
                                <svg class="w-12 h-12 text-italia-blue-500 group-hover:text-italia-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        @if(isset($card['title']))
                            <h3 class="text-xl font-semibold mb-2 text-gray-900 group-hover:text-italia-blue-500 transition-colors">
                                {{ $card['title'] }}
                            </h3>
                        @endif
                        
                        @if(isset($card['description']))
                            <p class="text-gray-600 mb-4">
                                {{ $card['description'] }}
                            </p>
                        @endif
                        
                        @if(isset($card['meta']))
                            <span class="text-sm text-gray-500">
                                {{ $card['meta'] }}
                            </span>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
