{{--
    Page Component - Theme Wrapper for Cms Page Component
    
    This is a minimal wrapper that delegates to the Cms module's Page component.
    All logic (JSON loading, block resolution) is in Modules/Cms/app/View/Components/Page.php
    
    Usage: <x-page side="content" :slug="$pageSlug" :data="$data" />
    
    DOCS: Modules/Cms/docs/PAGE_COMPONENT_ARCHITECTURE.md
--}}

@props([
    'side' => 'content',
    'slug' => '',
    'data' => [],
])

{{-- Delegate to Cms module's page component --}}
<x-cms-page 
    :side="$side" 
    :slug="$slug" 
    :data="$data" 
/>
