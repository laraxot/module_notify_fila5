{{--
    BMAD-METHOD: Header Section Component
    - Uses design-comuni-header-copied component
    - Follows DRY principle
    - Data passed from JSON config
--}}
@props(['data' => []])

{{-- BMAD: Delegate to header component --}}
<x-layout.design-comuni-header-copied 
    :regionName="($data['region_name'] ?? 'Nome della Regione')"
    :cityName="($data['city_name'] ?? 'Il mio Comune')"
    :tagline="($data['tagline'] ?? 'Un comune da vivere')"
    :logoUrl="($data['logo_url'] ?? null)"
    :socialLinks="($data['social_links'] ?? null)"
/>
