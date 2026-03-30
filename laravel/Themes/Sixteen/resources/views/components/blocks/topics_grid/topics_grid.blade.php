@props(['block'])

@php
    $title = $block->data['title'] ?? 'Argomenti';
    $topics = $block->data['topics'] ?? [];
@endphp

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4 max-w-7xl">
        @if($title)
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-900">
                {{ $title }}
            </h2>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($topics as $topic)
                <a 
                    href="{{ $topic['link'] ?? '#' }}"
                    class="block p-6 bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow border border-gray-200"
                >
                    <div class="flex items-start space-x-4">
                        @if(isset($topic['icon']))
                            <div class="flex-shrink-0">
                                <x-heroicon-o-{{ $topic['icon'] }} class="w-8 h-8 text-blue-600" />
                            </div>
                        @endif
                        
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                {{ $topic['title'] ?? 'Topic' }}
                            </h3>
                            
                            @if(isset($topic['description']))
                                <p class="text-gray-600">
                                    {{ $topic['description'] }}
                                </p>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
