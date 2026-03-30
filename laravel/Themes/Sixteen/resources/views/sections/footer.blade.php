@props(['data' => [], 'tpl' => 'full'])

{{-- 
    Footer Section Component
    Usage: <x-section slug="footer" :data="$footerData" tpl="full" />
    Templates: 'full' (default) or 'slim'
--}}

@if($tpl === 'slim')
    @include('sections.footer-slim', ['data' => $data])
@else
    @include('sections.footer-full', ['data' => $data])
@endif
