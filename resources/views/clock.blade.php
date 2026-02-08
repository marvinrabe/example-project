<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Clock - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] flex items-center justify-center min-h-screen flex-col">
        <main class="flex flex-col items-center gap-6">
            <h1 class="text-2xl font-medium">Clock</h1>
            <time id="clock" class="text-6xl font-semibold tabular-nums tracking-tight" aria-live="polite"></time>
            <a href="/" class="text-sm text-[#706f6c] dark:text-[#A1A09A] underline underline-offset-4 hover:text-[#1b1b18] dark:hover:text-[#EDEDEC]">Back to home</a>
        </main>

        <script>
            function updateClock() {
                const now = new Date();
                const time = now.toLocaleTimeString();
                document.getElementById('clock').textContent = time;
            }

            updateClock();
            setInterval(updateClock, 1000);
        </script>
    </body>
</html>
