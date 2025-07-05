<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-t">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="container mx-auto mt-4 font-sans antialiased bg-gray-100">
        <div class="min-h-screen">
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>