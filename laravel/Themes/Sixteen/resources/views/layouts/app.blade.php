<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    {{-- Bootstrap Italia CSS - CDN (EXACT match with Design Comuni) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-italia@2.8.8/dist/css/bootstrap-italia.min.css" />
</head>
<body>
    {{-- Skip Links - EXACT Bootstrap Italia Structure --}}
    <div class="skiplink">
        <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
        <a class="visually-hidden-focusable" href="#footer">Vai al
            footer</a>
    </div><!-- /skiplink -->

    {{-- Header Wrapper - EXACT Bootstrap Italia Structure --}}
    <header class="it-header-wrapper">
        {{-- Header - Bootstrap Italia EXACT Structure --}}
        <x-section slug="header" />
    </header>

    {{-- Main Content - EXACT Bootstrap Italia Structure --}}
    <main id="main-container">
        <div class="container">
            @yield('content')
            <x-page side="content" :slug="$slug ?? ''" :data="$data ?? []" />
        </div>
    </main>

    {{-- Footer - Bootstrap Italia EXACT Structure --}}
    <x-section slug="footer" tpl="full" />

    {{-- Scripts --}}
    @stack('scripts')
</body>
</html>
