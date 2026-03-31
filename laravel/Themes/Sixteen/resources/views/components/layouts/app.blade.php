{{--
    Layout App - Bootstrap Italia EXACT (Replicated with Tailwind + Alpine.js)
    BMAD-METHOD Applied:
    - DRY: Use <x-section> components
    - KISS: Simple structure
    - SOLID: Single responsibility
    - NO Bootstrap Italia CSS/JS - ALL Tailwind @apply + Alpine.js
--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    {{-- Vite Assets - CORRECT: Relative path with theme parameter and public path --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'], 'themes/Sixteen', 'Themes/Sixteen/public')
</head>
<body>
    {{-- Skip Links - Bootstrap Italia EXACT Structure --}}
    <div class="skiplink">
        <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
        <a class="visually-hidden-focusable" href="#footer">Vai al footer</a>
    </div><!-- /skiplink -->

    {{-- Header - Use Section Component (DRY) --}}
    <x-section slug="header" />

    {{-- Main Content --}}
    <main id="main-container">
        {{ $slot }}
    </main>

    {{-- Footer - Use Section Component (DRY) --}}
    <x-section slug="footer" />

    {{-- Scripts Stack --}}
    @stack('scripts')
</body>
</html>
