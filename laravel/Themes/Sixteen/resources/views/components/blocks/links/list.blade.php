@props([
    'title' => '',
    'links' => [],
    'layout' => 'list'
])

<section class="links-block py-12 bg-white">
    <div class="container mx-auto px-4">
        @if($title)
            <h2 class="text-3xl font-bold mb-8 text-gray-900">
                {{ $title }}
            </h2>
        @endif
        
        @if($layout === 'grid')
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($links as $link)
                    <a href="{{ $link['url'] ?? '#' }}" class="link-item block p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                        @if(isset($link['label']))
                            <h3 class="text-lg font-semibold text-italia-blue-500 mb-1">
                                {{ $link['label'] }}
                            </h3>
                        @endif
                        
                        @if(isset($link['description']))
                            <p class="text-gray-600 text-sm">
                                {{ $link['description'] }}
                            </p>
                        @endif
                        
                        @if(isset($link['meta']))
                            <span class="text-xs text-gray-500 mt-2 block">
                                {{ $link['meta'] }}
                            </span>
                        @endif
                    </a>
                @endforeach
            </div>
        @else
            <div class="space-y-2 max-w-3xl">
                @foreach($links as $link)
                    <a href="{{ $link['url'] ?? '#' }}" class="link-item block p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                @if(isset($link['label']))
                                    <h3 class="text-lg font-semibold text-italia-blue-500">
                                        {{ $link['label'] }}
                                    </h3>
                                @endif
                                
                                @if(isset($link['description']))
                                    <p class="text-gray-600 text-sm mt-1">
                                        {{ $link['description'] }}
                                    </p>
                                @endif
                            </div>
                            
                            @if(isset($link['meta']))
                                <span class="text-sm text-gray-500 ml-4">
                                    {{ $link['meta'] }}
                                </span>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>
