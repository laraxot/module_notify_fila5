@props([
    'title' => '',
    'description' => '',
    'button_text' => '',
    'button_url' => '',
    'button_color' => 'bg-italia-blue-500 hover:bg-italia-blue-600'
])

<section class="cta-block py-12 bg-italia-blue-50">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            @if($title)
                <h2 class="text-3xl font-bold mb-4 text-gray-900">
                    {{ $title }}
                </h2>
            @endif
            
            @if($description)
                <p class="text-lg text-gray-600 mb-8">
                    {{ $description }}
                </p>
            @endif
            
            @if($button_text && $button_url)
                <a href="{{ $button_url }}" class="inline-block {{ $button_color }} text-white font-semibold py-3 px-8 rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    {{ $button_text }}
                </a>
            @endif
        </div>
    </div>
</section>
