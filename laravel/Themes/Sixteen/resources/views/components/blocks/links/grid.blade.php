@props([
    'title' => '',
    'links' => [],
])

@if(!empty($links))
<section class="py-8 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($title)
            <h3 class="text-2xl font-bold text-gray-900 mb-6">{{ $title }}</h3>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($links as $link)
                <a href="{{ $link['url'] ?? '#' }}" class="block p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="font-semibold text-gray-900">{{ $link['label'] ?? '' }}</h4>
                            @if(!empty($link['description']))
                                <p class="text-sm text-gray-600 mt-1">{{ $link['description'] }}</p>
                            @endif
                        </div>
                        <x-filament::icon icon="heroicon-o-arrow-right" class="w-5 h-5 text-gray-400" />
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif
