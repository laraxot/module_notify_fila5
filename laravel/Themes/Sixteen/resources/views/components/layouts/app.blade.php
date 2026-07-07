{{--
    App Layout - Public Frontend
    ════════════════════════════════════════════════════════════════
    
    EXTENDS: x-layouts.main (resources/views/components/layouts/main.blade.php)
    
    CONTIENE (obbligatorio per Design Comuni):
    - Skip Links (accessibilità WCAG AA)
    - Header Section
    - Main Container con id="main-container"
    - Footer Section
    
    USAGE:
    ```blade
    <x-layouts.app>
        <x-page side="content" :slug="$pageSlug" :data="$data" />
    </x-layouts.app>
    ```
    
    ARCHITECTURE:
    - x-layouts.main: Base HTML structure (DOCTYPE, head, body, scripts)
    - x-layouts.app: Public frontend wrapper con skip links, header, main, footer
    - x-layouts.guest: Authentication pages (login, register)
    - x-layouts.auth: Protected dashboard pages
    
    LAYOUT HIERARCHY:
    → docs/layout-hierarchy.md
    
    DRY + KISS:
    - Skip links, header, footer sono nel layout, NON nelle singole pagine
    - Le pagine (es. tests/[slug].blade.php) contengono SOLO il contenuto specifico
    
    VITE CONFIGURATION:
    - MUST use @vite([...], 'themes/Sixteen') with second parameter
--}}
@props(['title' => ''])

<x-layouts.main>
    {{-- Skip Links - Accessibility (WCAG AA) --}}
    <div class="skiplink">
        <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
        <a class="visually-hidden-focusable" href="#footer">Vai al footer</a>
    </div>

    {{-- Header Section --}}
    <x-section slug="header" />

    {{-- Main Content - Il contenuto pagina specifica --}}
    <main id="main-container">
        {{ $slot }}
    </main>

    {{-- Footer Section --}}
    <x-section slug="footer" />
</x-layouts.main>
