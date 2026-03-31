{{-- Governance Cards Block - Organi di governo (Tailwind CSS) --}}
{{-- Reference: design-comuni-pagine-statiche/sito/homepage.hbs #calendario section --}}
@props([
    'title' => 'Organi di governo',
    'items' => [],
])

<div class="bg-gray-50 py-8 lg:py-12 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($items as $item)

            @if(!empty($item['image']))
            {{-- Card con immagine (es. Sindaco) --}}
            <div class="bg-white rounded shadow-sm border border-gray-200 flex flex-col overflow-hidden">
                <div class="flex flex-1 gap-0">
                    <div class="flex-1 p-4 pb-10 flex flex-col">
                        <div class="text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                            {{ $item['category'] ?? $title }}
                        </div>
                        @if(!empty($item['name']))
                            <h3 class="text-base font-medium text-gray-700 mb-1">{{ $item['name'] }}</h3>
                        @endif
                        <p class="text-sm text-gray-500 m-0">{{ $item['title'] ?? '' }}</p>
                    </div>
                    <div class="w-24 flex-shrink-0 pb-10">
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] ?? $item['title'] ?? '' }}"
                             class="w-full h-full object-cover object-top rounded-tr" />
                    </div>
                </div>
                <a href="{{ $item['url'] ?? '#' }}"
                   class="flex items-center gap-1 px-4 py-3 text-sm font-semibold text-blue-700 hover:text-blue-900 border-t border-gray-100 mt-auto">
                    Vai alla pagina
                    <x-filament::icon icon="heroicon-o-arrow-right" class="w-4 h-4" />
                </a>
            </div>

            @else
            {{-- Card senza immagine (es. Giunta, Consiglio) --}}
            <div class="bg-white rounded shadow-sm border border-gray-200 flex flex-col">
                <div class="p-4 pb-10 flex-1">
                    <div class="text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                        {{ $item['category'] ?? $title }}
                    </div>
                    <h3 class="text-base font-medium text-gray-700 mb-2">{{ $item['title'] ?? '' }}</h3>
                    @if(!empty($item['description']))
                        <p class="text-sm text-gray-500 m-0">{{ $item['description'] }}</p>
                    @endif
                </div>
                <a href="{{ $item['url'] ?? '#' }}"
                   class="flex items-center gap-1 px-4 py-3 text-sm font-semibold text-blue-700 hover:text-blue-900 border-t border-gray-100">
                    Vai alla pagina
                    <x-filament::icon icon="heroicon-o-arrow-right" class="w-4 h-4" />
                </a>
            </div>
            @endif

            @endforeach
        </div>
    </div>
</div>
