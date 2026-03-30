@props([
    'title' => '',
    'subtitle' => '',
    'content' => '',
    'image' => '',
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900',
    'cta_text' => '',
    'cta_link' => '',
    'cta_color' => 'bg-italia-blue-500 hover:bg-italia-blue-600'
])

<section class="hero {{ $background_color }} {{ $text_color }} py-12 lg:py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            @if($title)
                <h1 class="text-4xl lg:text-5xl font-bold mb-4">
                    {{ $title }}
                </h1>
            @endif
            
            @if($subtitle)
                <p class="text-xl lg:text-2xl mb-6 opacity-80">
                    {{ $subtitle }}
                </p>
            @endif
            
            @if($content)
                <div class="text-lg mb-8 prose prose-lg mx-auto">
                    {!! $content !!}
                </div>
            @endif
            
            @if($image)
                <div class="mb-8">
                    <img src="{{ $image }}" alt="{{ $title }}" class="rounded-lg shadow-xl max-w-full h-auto">
                </div>
            @endif
            
            @if($cta_text && $cta_link)
                <a href="{{ $cta_link }}" class="inline-block {{ $cta_color }} text-white font-semibold py-3 px-8 rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    {{ $cta_text }}
                </a>
            @endif
        </div>
    </div>
</section>
