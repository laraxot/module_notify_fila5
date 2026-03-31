{{--
    Layout App - Bootstrap Italia Design System
    Usage: <x-layouts.app>...</x-layouts.app>
--}}
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Nome del Comune' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Portale istituzionale del Comune' }}" />
    
    {{-- Vite Assets - CORRETTO SINTASSI --}}
    @vite(['Themes/Sixteen/resources/css/app.css'], 'themes/Sixteen')
</head>
<body>
    {{-- Skip Links - Bootstrap Italia --}}
    <div class="skiplink">
        <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
        <a class="visually-hidden-focusable" href="#footer">Vai al footer</a>
    </div>
    
    {{-- Header Section - BMAD: Use Components --}}
    <x-section slug="header" />
    
    {{-- Main Content --}}
    <main id="main-container">
        {{ $slot }}
    </main>
    
    {{-- Footer Section - BMAD: Use Components --}}
    <x-section slug="footer" tpl="full" />
</body>
</html>
