{{-- Hero Homepage - Tailwind CSS --}}
{{-- Reference: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html --}}
@props([
    'title' => 'NOME DEL COMUNE',
    'subtitle' => 'CONTENUTI IN EVIDENZA',
    'news' => [],
    'image' => null,
    'all_news_label' => 'Tutte le novità',
    'all_news_url' => '#',
])

<section class="py-12 md:py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <div class="lg:col-span-8 lg:col-start-3 text-center mb-10">
                <h2 class="text-lg font-semibold tracking-wider text-gray-500 dark:text-gray-400 uppercase mb-4">
                    {{ $subtitle }}
                </h2>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                    {{ $title }}
                </h1>
            </div>
            
            @if(!empty($news))
            <div class="lg:col-span-10 lg:col-start-2">
                <article class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="p-6 md:p-8">
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                            <div class="md:col-span-2">
                                @if($image)
                                <img src="{{ $image }}" 
                                     alt="{{ $news['title'] ?? '' }}" 
                                     class="w-full h-auto rounded-lg object-cover" 
                                     loading="lazy" />
                                @endif
                            </div>
                            <div class="md:col-span-3">
                                <div class="flex items-center text-sm text-primary-600 dark:text-primary-400 mb-3">
                                    @if(!empty($news['category']))
                                    <span class="me-3">{{ $news['category'] }}</span>
                                    @endif
                                    @if(!empty($news['date']))
                                    <time datetime="{{ $news['date'] }}" class="font-medium">
                                        {{ $news['date'] }}
                                    </time>
                                    @endif
                                </div>
                                
                                @if(!empty($news['title']))
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                                    <a href="{{ $news['url'] ?? '#' }}" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                                        {{ $news['title'] }}
                                    </a>
                                </h3>
                                @endif
                                
                                @if(!empty($news['description']))
                                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                                    {{ $news['description'] }}
                                </p>
                                @endif
                                
                                @if(!empty($news['tag']))
                                <div class="mb-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-200">
                                        {{ $news['tag'] }}
                                    </span>
                                </div>
                                @endif
                                
                                <a href="{{ $all_news_url }}" 
                                   class="inline-flex items-center text-primary-600 hover:text-primary-700 dark:text-primary-400 dark:hover:text-primary-300 font-medium transition-colors">
                                    {{ $all_news_label }}
                                    <svg class="w-4 h-4 ms-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            @endif
        </div>
    </div>
</section>
