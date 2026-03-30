@props([
    'title' => '',
    'items' => [],
    'layout' => 'default'
])

<section class="info-block py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        @if($title)
            <h2 class="text-3xl font-bold mb-8 text-center text-gray-900">
                {{ $title }}
            </h2>
        @endif
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
            @foreach($items as $item)
                <div class="info-item flex flex-col items-center text-center p-6 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    @if(isset($item['icon']))
                        <div class="mb-4">
                            <svg class="w-12 h-12 text-italia-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @if($item['icon'] === 'search')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                @elseif($item['icon'] === 'filter')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                @elseif($item['icon'] === 'bookmark')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                @elseif($item['icon'] === 'help')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                @endif
                            </svg>
                        </div>
                    @endif
                    
                    @if(isset($item['title']))
                        <h3 class="text-lg font-semibold mb-2 text-gray-900">
                            {{ $item['title'] }}
                        </h3>
                    @endif
                    
                    @if(isset($item['description']))
                        <p class="text-gray-600">
                            {{ $item['description'] }}
                        </p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
