{{--
    Design Comuni - Layout App
    Bootstrap Italia Layout
--}}

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Design Comuni Test Pages')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Il mio Comune')</title>

    {{-- Bootstrap Italia CSS --}}
    <link rel="stylesheet" href="/themes/sixteen/bootstrap-italia/dist/css/bootstrap-italia.min.css">
    <link href="/themes/sixteen/bootstrap-italia/dist/css/bootstrap-italia-comuni.css" rel="stylesheet">
    
    {{-- Custom CSS --}}
    @vite(['resources/css/app.css', 'resources/css/design-comuni.css'])
    
    @stack('styles')
</head>

<body class="@yield('body_class', '')">

@yield('content')

@stack('scripts')

</body>
</html>
