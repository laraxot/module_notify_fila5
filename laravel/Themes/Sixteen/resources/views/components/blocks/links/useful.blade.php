{{-- Useful Links - Design Comuni Style (Tailwind CSS) --}}
@props([
    'search_label'       => 'Cerca tra i link utili',
    'search_placeholder' => 'Inserisci una parola chiave',
    'links_heading'      => 'Link utili',
    'items'              => [],  // [ ['label'=>'...','url'=>'...'] ]
])

<section class="bg-gray-50 py-10 lg:py-14">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">

            {{-- Campo di ricerca --}}
            <div class="mb-8">
                @if($search_label)
                    <label for="useful-links-search" class="block text-sm font-semibold text-gray-700 mb-2">
                        {{ $search_label }}
                    </label>
                @endif
                <div class="relative">
                    <input
                        type="search"
                        id="useful-links-search"
                        placeholder="{{ $search_placeholder }}"
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 bg-white text-gray-900 text-sm"
                        x-data
                        x-on:input.debounce.300ms="
                            const q = $event.target.value.toLowerCase();
                            document.querySelectorAll('[data-useful-link]').forEach(el => {
                                el.style.display = el.textContent.toLowerCase().includes(q) ? '' : 'none';
                            });
                        "
                    />
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                        <x-filament::icon icon="heroicon-o-magnifying-glass" class="w-4 h-4" />
                    </span>
                </div>
            </div>

            {{-- Heading "Link utili" --}}
            @if($links_heading)
                <h2 class="text-xl lg:text-2xl font-semibold text-gray-900 mb-5">{{ $links_heading }}</h2>
            @endif

            {{-- Lista link --}}
            @if(!empty($items))
                <ul class="divide-y divide-gray-200 border border-gray-200 rounded bg-white">
                    @foreach($items as $item)
                        <li data-useful-link>
                            <a href="{{ $item['url'] ?? '#' }}"
                               class="flex items-center justify-between gap-3 px-5 py-4 text-blue-700 font-medium hover:bg-blue-50 hover:text-blue-900 transition-colors focus:outline-none focus:bg-blue-50">
                                <span>{{ $item['label'] ?? '' }}</span>
                                <x-filament::icon icon="heroicon-o-arrow-right" class="w-4 h-4 flex-shrink-0" />
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500 text-sm">Nessun link disponibile.</p>
            @endif

        </div>
    </div>
</section>
