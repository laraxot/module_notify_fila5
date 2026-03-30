@props([
    'title' => '',
    'sections' => [],
    'columns' => 3
])

<section class="features-block py-12 bg-white">
    <div class="container mx-auto px-4">
        @if($title)
            <h2 class="text-3xl font-bold mb-8 text-center text-gray-900">
                {{ $title }}
            </h2>
        @endif
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-{{ $columns }} gap-8 max-w-6xl mx-auto">
            @foreach($sections as $section)
                <div class="feature-item p-6 rounded-lg hover:bg-gray-50 transition-colors">
                    @if(isset($section['icon']))
                        <div class="mb-4">
                            <svg class="w-12 h-12 text-italia-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @if($section['icon'] === 'it-services' || $section['icon'] === 'card')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                @elseif($section['icon'] === 'it-pa' || $section['icon'] === 'users')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                @elseif($section['icon'] === 'it-info-circle' || $section['icon'] === 'info')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                @elseif($section['icon'] === 'it-calendar' || $section['icon'] === 'calendar')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                @elseif($section['icon'] === 'it-home' || $section['icon'] === 'home')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                @elseif($section['icon'] === 'it-shield' || $section['icon'] === 'shield')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                @elseif($section['icon'] === 'it-list' || $section['icon'] === 'list')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                @endif
                            </svg>
                        </div>
                    @endif
                    
                    @if(isset($section['title']))
                        <h3 class="text-xl font-semibold mb-2 text-gray-900">
                            {{ $section['title'] }}
                        </h3>
                    @endif
                    
                    @if(isset($section['description']))
                        <p class="text-gray-600">
                            {{ $section['description'] }}
                        </p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
