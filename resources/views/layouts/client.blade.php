<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ (app()->getLocale() === 'ar') ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(isset($title)) {{ $title }} | {{ config('app.name') }} @else {{ config('app.name') }} @endif
    </title>

    <meta name="description" content="{{ @trans('App Gratuito It will help you to stop Smoking And avoid nicotine withdrawal symptoms') }}">
    <meta name="keywords" content="{{ @trans('stop smoking , quit smoking , how to stop smoking , avoid smoking ,best app to quit smoke , free of smoking,avoid nicotine symptoms') }}">
    <meta name="author" content="App Gratuito">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">

    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    @stack('styles')
</head>
<body>

@include('layouts.navigation.main')

{{ $slot }}

@include('layouts.footer.main')
@vite(['resources/js/app.js'])
@stack('scripts')
</body>
</html>
