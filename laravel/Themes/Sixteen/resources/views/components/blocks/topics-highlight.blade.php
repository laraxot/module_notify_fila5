@props(['title' => 'In evidenza', 'topics' => []])

{{-- 
    Topics Highlight Component - Design Comuni "In evidenza" Style
    Usage: <x-blocks.topics-highlight title="In evidenza" :topics="$topics" />
    
    DESIGN COMUNI REFERENCE: argomenti.html - "In evidenza" section
    - Uses it-grid-item-wrapper it-grid-item-overlay pattern
    - Image with overlay text
--}}

<section class="py-5">
    <div class="container">
        @if($title)
            <h2 class="title-xxlarge mb-4">{{ $title }}</h2>
        @endif
        
        <div class="row g-4">
            @foreach($topics as $topic)
            <div class="col-sm-6 col-lg-4">
                <div class="it-grid-item-wrapper it-grid-item-overlay">
                    <a href="{{ $topic['url'] ?? '#' }}">
                        <div class="img-responsive-wrapper">
                            <div class="img-responsive">
                                <div class="img-wrapper">
                                    <img src="{{ $topic['image'] ?? 'https://picsum.photos/376/488' }}" 
                                         alt="{{ $topic['title'] ?? '' }}" 
                                         title="{{ $topic['title'] ?? 'Image' }}"
                                         class="w-100 h-auto object-cover">
                                </div>
                            </div>
                        </div>
                        <div class="it-griditem-text-wrapper">
                            <h3>{{ $topic['title'] ?? '' }}</h3>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
