@props(['data' => []])

{{-- 
    Top Bar Component - Design Comuni Style
    Usage: <x-blocks.top-bar :data="$topBarData" />
    
    Data structure:
    - region_name: string
    - languages: array
--}}

@php
    $regionName = $data['region_name'] ?? 'Nome della Regione';
    $languages = $data['languages'] ?? [
        ['code' => 'ita', 'label' => 'ITA', 'active' => true],
        ['code' => 'eng', 'label' => 'ENG', 'active' => false],
    ];
@endphp

<div class="it-header-slim-wrapper" style="background-color: var(--bs-primary-dark); border-bottom: 1px solid rgba(255,255,255,0.2);">
    <div class="container">
        <div class="row align-items-center py-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                {{-- Region Name --}}
                <span class="text-white text-sm font-medium">{{ $regionName }}</span>
                
                {{-- Language Selector --}}
                <div class="language-selector d-flex gap-2">
                    @foreach($languages as $lang)
                    <button 
                        class="btn btn-sm px-3 py-1 {{ $lang['active'] ? 'bg-white text-primary' : 'bg-transparent text-white hover:bg-white/20' }} transition-colors"
                        style="font-size: 0.875rem;"
                        aria-label="Switch to {{ $lang['label'] }}"
                    >
                        {{ $lang['label'] }}
                    </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
