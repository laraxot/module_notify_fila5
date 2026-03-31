{{-- Hero Homepage - Design Comuni Style (Tailwind CSS) --}}
@props([
    'news'           => [],
    'image'          => null,
    'all_news_label' => 'Tutte le novità',
    'all_news_url'   => '#',
])

<section id="head-section" class="bg-white">
    <div class="container mx-auto px-4">
        {{-- Mobile: immagine sopra; Desktop: news sx + immagine dx --}}
        <div class="flex flex-col-reverse lg:flex-row lg:items-stretch min-h-[28rem]">

            {{-- Colonna sinistra: news card --}}
            <div class="flex-1 py-8 lg:py-12 lg:pr-8 flex flex-col justify-center">

                @if(!empty($news))
                    {{-- Categoria + icona calendario --}}
                    <div class="flex items-center gap-2 mb-3">
                        @if(!empty($news['category']))
                            <span class="text-xs font-semibold uppercase tracking-wider text-blue-700">
                                {{ $news['category'] }}
                            </span>
                        @endif
                        <x-filament::icon icon="heroicon-o-calendar-days" class="w-4 h-4 text-gray-400" />
                        @if(!empty($news['date']))
                            <time class="text-xs text-gray-500">{{ $news['date'] }}</time>
                        @endif
                    </div>

                    {{-- Titolo --}}
                    @if(!empty($news['title']))
                        <h3 class="text-2xl lg:text-3xl font-semibold text-gray-900 mb-4 leading-tight">
                            <a href="{{ $news['url'] ?? '#' }}" class="hover:text-blue-700 focus:outline-none focus:underline">
                                {{ $news['title'] }}
                            </a>
                        </h3>
                    @endif

                    {{-- Excerpt --}}
                    @if(!empty($news['excerpt']))
                        <p class="text-gray-600 mb-5 leading-relaxed">
                            {{ $news['excerpt'] }}
                        </p>
                    @endif

                    {{-- Tag chip --}}
                    @if(!empty($news['tag']))
                        <div class="mb-6">
                            <span class="inline-block bg-blue-50 text-blue-700 text-xs font-medium px-3 py-1 rounded-full border border-blue-200">
                                {{ $news['tag'] }}
                            </span>
                        </div>
                    @endif
                @endif

                {{-- Link "Tutte le novità" --}}
                <div class="mt-auto">
                    <a href="{{ $all_news_url }}"
                       class="inline-flex items-center gap-1 text-blue-700 font-semibold text-sm hover:underline focus:outline-none focus:underline">
                        {{ $all_news_label }}
                        <x-filament::icon icon="heroicon-o-arrow-right" class="w-4 h-4" />
                    </a>
                </div>
            </div>

            {{-- Colonna destra: immagine --}}
            @if($image)
                <div class="lg:w-1/2 xl:w-5/12 overflow-hidden">
                    <img src="{{ $image }}"
                         alt="{{ $news['title'] ?? '' }}"
                         class="w-full h-56 lg:h-full object-cover"
                         loading="lazy" />
                </div>
            @endif

        </div>
    </div>
</section>
