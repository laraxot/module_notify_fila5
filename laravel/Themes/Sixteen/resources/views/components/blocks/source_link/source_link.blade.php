@props(['block'])

@php
    $title = $block->data['title'] ?? 'Riferimento';
    $url = $block->data['url'] ?? '#';
    $text = $block->data['text'] ?? 'Vedi riferimento';
@endphp

<div class="mt-8 pt-6 border-t border-gray-200">
    <p class="text-sm text-gray-500 mb-2">{{ $title }}</p>
    <a 
        href="{{ $url }}"
        target="_blank"
        rel="noopener noreferrer"
        class="inline-flex items-center text-blue-600 hover:text-blue-800"
    >
        {{ $text }}
        <x-heroicon-m-arrow-top-right-on-square class="w-4 h-4 ml-1" />
    </a>
</div>
