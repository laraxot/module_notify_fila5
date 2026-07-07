{{--
    App Layout - Public Frontend
    Design Comuni Italia - Bootstrap Italia Classes
    
    EXTENDS: x-layouts.main (resources/views/components/layouts/main.blade.php)
    
    USAGE:
    ```blade
    <x-layouts.app title="Home">
        <x-section slug="header" />
        <main>{{ $slot }}</main>
        <x-section slug="footer" />
    </x-layouts.app>
    ```
    
    ARCHITECTURE:
    - x-layouts.main: Base HTML structure (DOCTYPE, head, body, scripts)
    - x-layouts.app: Public frontend wrapper with header/footer sections
    - x-layouts.guest: Authentication pages (login, register)
    - x-layouts.auth: Protected dashboard pages
    
    WHY app.blade.php MUST extend main.blade.php:
    1. DRY - HTML structure definita UNA sola volta
    2. KISS - main gestisce complessità, app aggiunge semantica
    3. Single Source of Truth - Dark mode, Vite, Filament
    4. Maintainability - Update 1 file, not 4
    5. Consistency - Stesso HTML per tutte le pagine
    
    DOCUMENTATION:
    → Layout Architecture: docs/layout-architecture.md#x-layoutsapp
    → Main Layout: docs/layout-architecture.md#x-layoutsmain
    → Theme Index: docs/README.md
    
    EXTENDED BY:
    - Homepage
    - CMS pages
    - Blog listing
    - Public profiles
    
    RELATED COMPONENTS:
    → x-section: resources/views/components/section.blade.php
    → x-header: resources/views/components/header.blade.php
    → x-footer: resources/views/components/footer.blade.php
--}}
@props(['title' => ''])

<x-layouts.main>
    {{-- Skip Links - EXACT Bootstrap Italia Structure --}}
    <div class="skiplink">
        <a class="visually-hidden-focusable" href="#main-content">Vai ai contenuti</a>
        <a class="visually-hidden-focusable" href="#footer">Vai al footer</a>
    </div><!-- /skiplink -->

    {{-- Header Section - Bootstrap Italia Component (includes header tag) --}}
    <x-section slug="header" />

    {{-- Main Content --}}
    <main id="main-content">
        {{ $slot }}
    </main>

    {{-- Footer Section --}}
    <x-section slug="footer" tpl="full" />
</x-layouts.main>
