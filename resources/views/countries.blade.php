<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EU Countries - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] min-h-screen flex flex-col p-6">
        @include('partials.nav')
        <main class="flex-1 flex flex-col items-center justify-center gap-6 w-full max-w-md mx-auto">
            <h1 class="text-2xl font-medium">EU Countries</h1>
            <ul id="countries-list" class="w-full flex flex-col gap-2">
                @foreach ($countries as $country)
                    <li class="flex items-center justify-between p-3 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
                        <span>{{ $country->name }}</span>
                        <form method="POST" action="/countries/{{ $country->id }}/toggle-great">
                            @csrf
                            <button type="submit" class="text-sm px-3 py-1 rounded-md {{ $country->is_great ? 'bg-yellow-400 text-black' : 'bg-[#e3e3e0] dark:bg-[#3E3E3A] text-[#706f6c] dark:text-[#A1A09A]' }}">
                                {{ $country->is_great ? '⭐ Great!' : 'Mark as Great' }}
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </main>
    </body>
</html>
