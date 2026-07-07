{{--
    App Layout - Public Frontend
    ════════════════════════════════════════════════════════════════
    
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
    
    VITE CONFIGURATION:
    - Assets are built in laravel/Themes/Sixteen/
    - outDir: './public' in vite.config.js
    - Built assets copied to public_html/themes/Sixteen/
    - MUST use @vite([...], 'themes/Sixteen') with second parameter
    - Second parameter tells Laravel where to find manifest.json
    
    WHY SECOND PARAMETER IS REQUIRED:
    1. Theme is built independently from main Laravel app
    2. Vite builds to themes/Sixteen/public/
    3. Manifest.json is in public_html/themes/Sixteen/manifest.json
    4. Without second param, Laravel looks in public_html/build/manifest.json (WRONG!)
    5. With second param, Laravel looks in public_html/themes/Sixteen/manifest.json (CORRECT!)
    
    DRY + KISS:
    - main.blade.php contains ONLY essential HTML structure
    - app.blade.php adds public frontend semantics
    - No duplication: all Vite assets in main.blade.php
    
    DOCUMENTATION:
    → Layout Architecture: docs/layout-architecture.md#x-layoutsapp
    → Main Layout: docs/layout-architecture.md#x-layoutsmain
    → Vite Configuration: docs/VITE_MANIFEST_FIX_COMPLETE.md
    → Vite Second Parameter: docs/VITE_SECOND_PARAMETER_GUIDE.md
    → Theme Index: docs/README.md
--}}
@props(['title' => ''])

<x-layouts.main>
    <x-section slug="header" />
    {{ $slot }}
    <x-section slug="footer" />
</x-layouts.main>
