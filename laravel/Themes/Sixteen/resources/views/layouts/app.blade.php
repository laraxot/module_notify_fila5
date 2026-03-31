<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    {{-- Skip Links - Bootstrap Italia --}}
    <div class="skiplink">
        <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
        <a class="visually-hidden-focusable" href="#footer">Vai al footer</a>
    </div>

    {{-- Header - Bootstrap Italia Structure --}}
    <x-section slug="header" />

    {{-- Main Content --}}
    <main id="main-container">
        {{-- Content from JSON --}}
        <x-page side="content" :slug="$slug ?? ''" :data="$data ?? []" />
    </main>

    {{-- Footer - Bootstrap Italia Structure --}}
    <x-section slug="footer" />

    {{-- Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'], 'themes/Sixteen')
</body>
</html>
