{{--
    |--------------------------------------------------------------------------
    | Card Standard Component - Design Comuni
    |--------------------------------------------------------------------------
    |
    | Standard Bootstrap Italia card component.
    |
    | Usage:
    | @include('design-comuni.components.card-standard', [
    |     'title' => 'Card Title',
    |     'text' => 'Card description text',
    |     'link' => route('page.show', $id),
    |     'linkText' => 'Read more',
    |     'image' => asset('path/to/image.jpg'),
    |     'category' => 'Notizie',
    |     'date' => '18 mag 2022',
    |     'tags' => ['Tag 1', 'Tag 2'],
    | ])
    |
    | @package Design Comuni
    | @subpackage Components
    | @version 1.0.0
    |
--}}

@props([
    'title' => '',
    'text' => '',
    'link' => '#',
    'linkText' => null,
    'image' => null,
    'imagePosition' => 'top', // top, right, left
    'category' => null,
    'categoryIcon' => null,
    'date' => null,
    'tags' => [],
    'size' => 'default', // default, large
    'shadow' => true,
    'border' => 'light', // light, dark, null
])

<div @class([
    'card',
    'mb-5' => $size === 'default',
    'shadow-sm' => $shadow,
    'border-' . $border => $border,
])>
    <div class="card-body pb-5 px-0">
        
        {{-- Category and Date --}}
        @if($category || $date)
        <div class="category-top">
            @if($categoryIcon)
            <svg class="icon icon-sm" aria-hidden="true">
                <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#' . $categoryIcon) }}"></use>
            </svg>
            @endif
            @if($category)
            <span class="title-xsmall-semi-bold fw-semibold">{{ $category }}</span>
            @endif
            @if($date)
            <span class="data fw-normal">{{ $date }}</span>
            @endif
        </div>
        @endif
        
        {{-- Image - Top Position --}}
        @if($image && $imagePosition === 'top')
        <img src="{{ $image }}" 
             alt="{{ $title }}" 
             class="img-fluid mb-4"
             loading="lazy">
        @endif
        
        {{-- Title --}}
        @if($title)
        <a href="{{ $link }}" class="text-decoration-none">
            <h3 class="card-title">{{ $title }}</h3>
        </a>
        @endif
        
        {{-- Text --}}
        @if($text)
        <p class="mb-4 pt-3 lora">{!! $text !!}</p>
        @endif
        
        {{-- Tags --}}
        @if(count($tags) > 0)
        <div class="tags-top">
            @foreach($tags as $tag)
            <a class="chip chip-simple" href="#">
                <span class="chip-label">{{ $tag }}</span>
            </a>
            @endforeach
        </div>
        @endif
        
        {{-- Link --}}
        @if($linkText || $link)
        <a class="read-more pb-3" href="{{ $link }}">
            <span class="text">{{ $linkText ?? 'Leggi tutto' }}</span>
            <svg class="icon">
                <use xlink:href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-arrow-right') }}"></use>
            </svg>
        </a>
        @endif
        
    </div>
</div>
