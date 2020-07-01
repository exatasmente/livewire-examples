<!DOCTYPE html>
<html lang="en" class="antialiased">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ $title ? strip_tags($title) . ' | ' : '' }}{{ config('app.name') }}</title>
        @stack('meta')
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i,900" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css') }}">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.2.0/dist/alpine-ie11.js" defer></script>
        @livewireStyles
    </head>
    <body class="flex flex-col justify-between min-h-screen font-sans leading-normal text-gray-800 bg-gray-100">
        @yield('content')
        <script src="{{ mix('js/main.js') }}"></script>
        @livewireScripts
        @stack('scripts')
    </body>
</html>
