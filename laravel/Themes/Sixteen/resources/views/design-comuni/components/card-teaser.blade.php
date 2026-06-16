{{--
    |--------------------------------------------------------------------------
    | Card Teaser Component - Design Comuni
    |--------------------------------------------------------------------------
    |
    | Teaser card with image overlay for topics and featured content.
    |
    | Usage:
    | @include('design-comuni.components.card-teaser', [
    |     'title' => 'Topic Title',
    |     'description' => 'Short description',
    |     'link' => route('topic.show', $id),
    |     'image' => asset('path/to/image.jpg'),
    |     'links' => [['label' => 'Link 1', 'url' => '#']],
    | ])
    |
    | @package Design Comuni
    | @subpackage Components
    | @version 1.0.0
    |
--}}

@props([
    'title' => '',
    'description' => '',
    'link' => '#',
    'linkText' => 'Esplora argomento',
    'image' => null,
    'links' => [],
    'innerCard' => null, // For nested card structure
    'shadow' => true,
    'border' => 'light',
])

<div @class([
    'card',
    'card-teaser',
    'no-after',
    'rounded',
    'shadow-sm' => $shadow,
    'mb-0',
    'border-' . $border => $border,
])>
    <div class="card-body pb-5">
        
        {{-- Title --}}
        @if($title)
        <h3 class="card-title text-paragraph-medium u-grey-light">{{ $title }}</h3>
        @endif
        
        {{-- Description --}}
        @if($description)
        <p class="text-paragraph-card u-grey-light m-0">{{ $description }}</p>
        @endif
        
        {{-- Inner Card (for nested structure) --}}
        @if($innerCard)
        <div class="mt-4">
            {{ $innerCard }}
        </div>
        @endif
        
        {{-- Links List --}}
        @if(count($links) > 0)
        <div class="link-list-wrapper mt-4">
            <ul class="link-list">
                @foreach($links as $linkItem)
                <li>
                    <a class="list-item active icon-left mb-2" href="{{ $linkItem['url'] ?? '#' }}">
                        <span class="list-item-title-icon-wrapper">
                            <span class="text-success">{{ $linkItem['label'] ?? 'Link' }}</span>
                        </span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        
    </div>
    
    {{-- Read More Link --}}
    <a class="read-more pt-0" href="{{ $link }}">
        <span class="list-item-title-icon-wrapper">
            <span class="text">{{ $linkText }}</span>
            <svg class="icon">
                <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-arrow-right') }}"></use>
            </svg>
        </span>
    </a>
</div>
