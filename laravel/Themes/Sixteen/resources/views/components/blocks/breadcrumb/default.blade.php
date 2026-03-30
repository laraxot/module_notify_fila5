@props([
    'items' => [],
    'style' => 'default'
])

<nav class="breadcrumb py-4 bg-gray-50 border-b border-gray-200" aria-label="breadcrumb">
    <div class="container mx-auto px-4">
        <ol class="flex items-center space-x-2 text-sm">
            @foreach($items as $item)
                <li class="flex items-center">
                    @if(!$loop->last)
                        <a href="{{ $item['url'] ?? '#' }}" class="text-italia-blue-500 hover:text-italia-blue-600 transition-colors">
                            {{ $item['label'] ?? 'Home' }}
                        </a>
                        <span class="mx-2 text-gray-400">/</span>
                    @else
                        <span class="text-gray-600 font-medium" aria-current="page">
                            {{ $item['label'] ?? 'Pagina corrente' }}
                        </span>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
</nav>
