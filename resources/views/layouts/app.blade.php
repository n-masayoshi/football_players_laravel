<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Football Players</title>

        <link href="https://cdn.jsdelivr.net/npm/flowbite@latest/dist/flowbite.min.css" rel="stylesheet">

        {{-- css/app.css --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Flowbite JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/flowbite@latest/dist/flowbite.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Pusher --}}
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')
            <header class="navbar navbar-dark bg-dark min-h-10 py-4 max-w-screen-lg mx-auto">
                <div class="container text-xl mx-auto my-0">
                    <a href="/" class="navbar-brand">Football Players</a>
                </div>
            </header>
            <div class="container py-4 mx-auto my-0">
                @yield("content")
            </div>
        </div>
    </body>
</html>
