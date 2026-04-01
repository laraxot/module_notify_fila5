{{--
    Topics Grid Block - Universal reusable component
    
    USAGE:
    <x-pub_theme::components.blocks.topics-grid.default :topics="$topics" title="Argomenti" />
    
    DATA STRUCTURE:
    [
        [
            'title' => 'Cultura',
            'icon' => 'it-culture',
            'url' => '/it/cultura',
            'description' => 'Eventi, musei, biblioteche'
        ],
        ...
    ]
    
    BLOCK TYPE: topics-grid (UNIVERSAL, NOT page-specific)
    VIEW: pub_theme::components.blocks.topics-grid.default
    
    INSPIRED BY:
    - https://flowbite.com/blocks/
    - https://tailwindcss.com/plus/ui-blocks
    - https://italia.github.io/bootstrap-italia/docs/componenti/
--}}

@props(['topics' => [], 'title' => 'Argomenti'])

<div class="cmp-argomenti mt-8">
    @if($title)
        <h2 class="title-xxlarge mb-6">{{ $title }}</h2>
    @endif
    
    <div class="row g-4">
        @foreach($topics as $topic)
            <div class="col-12 col-md-6 col-lg-3">
                <a href="{{ $topic['url'] ?? '#' }}" 
                     class="card card-bg no-underline h-full hover:shadow-lg transition-shadow duration-200">
                    <div class="card-body p-4">
                        <div class="flex items-center gap-3 mb-3">
                            @if(isset($topic['icon']))
                                <x-filament::icon 
                                    :icon="'heroicon-'.($topic['icon'] ?? 'o-folder')" 
                                    class="w-8 h-8 text-primary"
                                />
                            @endif
                            <h3 class="title-medium-semi-bold mb-0 text-gray-900">
                                {{ $topic['title'] ?? 'Topic' }}
                            </h3>
                        </div>
                        @if(isset($topic['description']))
                            <p class="text-sm text-gray-600 mb-0">
                                {{ $topic['description'] }}
                            </p>
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
