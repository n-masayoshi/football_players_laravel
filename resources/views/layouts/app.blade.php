<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <header class="navbar navbar-dark bg-dark min-h-10 py-4 max-w-screen-lg mx-auto">
            <div class="container text-xl mx-auto my-0">
                <a href="/" class="navbar-brand">{{ config("app.name") }}</a>
            </div>
        </header>
        <div class="container py-4 mx-auto my-0">
            @yield("content")
        </div>
    </body>
</html>
