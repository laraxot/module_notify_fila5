{{--
    |--------------------------------------------------------------------------
    | Main Layout - Design Comuni
    |--------------------------------------------------------------------------
    |
    | Main layout wrapper for all Design Comuni pages.
    | Includes header, main content area, and footer.
    |
    | @package Design Comuni
    | @subpackage Layouts
    | @version 1.0.0
    |
--}}

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    
    {{-- Title --}}
    <title>@yield('title', config('app.name', 'Design Comuni'))</title>
    
    {{-- Meta tags --}}
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="@yield('meta_description', '')">
    <meta name="keywords" content="@yield('meta_keywords', '')">
    
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- Stylesheets --}}
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/css/bootstrap-italia.min.css') }}">
    <link href="{{ asset('themes/sixteen/design-comuni/assets/css/bootstrap-italia-comuni.css') }}" rel="stylesheet">
    
    {{-- Additional styles --}}
    @stack('head-styles')
</head>

<body>
    {{-- Skip links for accessibility --}}
    <div class="skiplink">
        <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
        <a class="visually-hidden-focusable" href="#footer">Vai al footer</a>
    </div>
    
    {{-- Header --}}
    @include('design-comuni.partials.header')
    
    {{-- Main Content --}}
    <main id="main-container">
        @yield('content')
    </main>
    
    {{-- Footer --}}
    @include('design-comuni.partials.footer')
    
    {{-- Scripts --}}
    <script src="{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/js/bootstrap-italia.bundle.min.js') }}"></script>
    <script>bootstrap.loadFonts("{{ asset('themes/sixteen/design-comuni/assets/bootstrap-italia/dist/fonts') }}")</script>
    
    @stack('scripts')
    @stack('foot-scripts')
</body>
</html>
