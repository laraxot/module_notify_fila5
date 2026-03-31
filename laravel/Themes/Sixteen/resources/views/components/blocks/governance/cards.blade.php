{{-- Governance Cards - Design Comuni Style (Tailwind CSS) --}}
@props([
    'title' => 'Organi di governo',
    'items' => [],
])

<section class="bg-gray-50 py-10 lg:py-14">
    <div class="container mx-auto px-4">

        {{-- Titolo sezione --}}
        @if($title)
            <h2 class="text-2xl lg:text-3xl font-semibold text-gray-900 mb-8">{{ $title }}</h2>
        @endif

        {{-- Grid 3 colonne --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($items as $item)
                <div class="bg-white rounded border border-gray-200 shadow-sm flex flex-col h-full overflow-hidden">

                    {{-- Immagine (opzionale – prima card solitamente sindaco) --}}
                    @if(!empty($item['image']))
                        <div class="overflow-hidden">
                            <img src="{{ $item['image'] }}"
                                 alt="{{ $item['name'] ?? $item['title'] ?? '' }}"
                                 class="w-full h-48 object-cover"
                                 loading="lazy" />
                        </div>
                    @endif

                    <div class="p-5 flex flex-col flex-1">
                        {{-- Categoria / header --}}
                        @if(!empty($item['category']))
                            <span class="text-xs font-semibold uppercase tracking-wider text-blue-700 mb-2">
                                {{ $item['category'] }}
                            </span>
                        @endif

                        {{-- Titolo --}}
                        @if(!empty($item['title']))
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">
                                {{ $item['title'] }}
                            </h3>
                        @endif

                        {{-- Descrizione / nome --}}
                        @if(!empty($item['name']))
                            <p class="text-gray-600 text-sm mb-4">{{ $item['name'] }}</p>
                        @elseif(!empty($item['description']))
                            <p class="text-gray-600 text-sm mb-4">{{ $item['description'] }}</p>
                        @endif

                        {{-- Link "Vai alla pagina" --}}
                        <div class="mt-auto pt-3 border-t border-gray-100">
                            <a href="{{ $item['url'] ?? '#' }}"
                               class="inline-flex items-center gap-1 text-blue-700 font-semibold text-sm hover:underline focus:outline-none focus:underline">
                                Vai alla pagina
                                <x-filament::icon icon="heroicon-o-arrow-right" class="w-4 h-4" />
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>
