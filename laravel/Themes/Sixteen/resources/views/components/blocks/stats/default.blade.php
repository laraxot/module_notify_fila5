@props([
    'title' => '',
    'stats' => [],
    'layout' => 'grid'
])

<section class="stats-block py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        @if($title)
            <h2 class="text-3xl font-bold mb-8 text-center text-gray-900">
                {{ $title }}
            </h2>
        @endif
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
            @foreach($stats as $stat)
                <div class="stat-item bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow text-center">
                    @if(isset($stat['icon']))
                        <div class="mb-4">
                            <svg class="w-12 h-12 text-italia-blue-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @if($stat['icon'] === 'users')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                @elseif($stat['icon'] === 'services')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                @elseif($stat['icon'] === 'events')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                @elseif($stat['icon'] === 'buildings')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                @endif
                            </svg>
                        </div>
                    @endif
                    
                    @if(isset($stat['value']))
                        <div class="text-4xl font-bold text-italia-blue-500 mb-2">
                            {{ $stat['value'] }}
                        </div>
                    @endif
                    
                    @if(isset($stat['label']))
                        <p class="text-gray-600 text-sm">
                            {{ $stat['label'] }}
                        </p>
                    @endif
                    
                    @if(isset($stat['change']))
                        <p class="text-green-600 text-xs mt-2">
                            {{ $stat['change'] }}
                        </p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
