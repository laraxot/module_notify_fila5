{{--
    App Layout - Public Frontend
    Extends: x-layouts.main (components/layouts/main.blade.php)
    
    USAGE:
    <x-layouts.app>
        <x-section slug="header" />
        <main>{{ $slot }}</main>
        <x-section slug="footer" />
    </x-layouts.app>
    
    ARCHITECTURE:
    - x-layouts.main: Base HTML structure (DOCTYPE, head, body, scripts)
    - x-layouts.app: Public frontend wrapper with header/footer sections
    - x-layouts.guest: Authentication pages (login, register)
    - x-layouts.auth: Protected dashboard pages
    
    DRY + KISS:
    - main.blade.php contains ONLY essential HTML structure
    - app.blade.php adds public frontend semantics
    - No duplication: all Vite assets in main.blade.php
--}}
@props(['title' => ''])

<x-layouts.main>
    {{ $slot }}
</x-layouts.main>
