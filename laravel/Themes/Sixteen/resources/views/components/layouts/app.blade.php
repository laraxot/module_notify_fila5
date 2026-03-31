<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'], 'themes/Sixteen', 'Themes/Sixteen/public')
</head>
<body>
    <div class="skiplink">
        <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
        <a class="visually-hidden-focusable" href="#footer">Vai al footer</a>
    </div>

    <x-section slug="header" />

    <main id="main-container">
        {{ $slot }}
    </main>

    <x-section slug="footer" />

    @stack('scripts')
</body>
</html>
