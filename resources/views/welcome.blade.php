<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <style>
            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                25% { transform: translateY(-12px) rotate(2deg); }
                75% { transform: translateY(8px) rotate(-2deg); }
            }
            @keyframes pulse-glow {
                0%, 100% { box-shadow: 0 0 20px rgba(245, 48, 3, 0.3); }
                50% { box-shadow: 0 0 40px rgba(245, 48, 3, 0.6), 0 0 60px rgba(245, 48, 3, 0.2); }
            }
            @keyframes slide-up {
                from { opacity: 0; transform: translateY(30px); }
                to { opacity: 1; transform: translateY(0); }
            }
            @keyframes wiggle {
                0%, 100% { transform: rotate(0deg); }
                25% { transform: rotate(-5deg); }
                75% { transform: rotate(5deg); }
            }
            @keyframes confetti-fall {
                0% { transform: translateY(-10px) rotate(0deg); opacity: 1; }
                100% { transform: translateY(60px) rotate(360deg); opacity: 0; }
            }
            @keyframes gradient-shift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            @keyframes tick-tock {
                0%, 100% { transform: rotate(-15deg); }
                50% { transform: rotate(15deg); }
            }
            @keyframes bounce-in {
                0% { transform: scale(0); opacity: 0; }
                50% { transform: scale(1.15); }
                100% { transform: scale(1); opacity: 1; }
            }
            .animate-float { animation: float 4s ease-in-out infinite; }
            .animate-float-delayed { animation: float 4s ease-in-out infinite 1s; }
            .animate-float-slow { animation: float 6s ease-in-out infinite 0.5s; }
            .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
            .animate-slide-up { animation: slide-up 0.8s ease-out forwards; }
            .animate-slide-up-delayed { animation: slide-up 0.8s ease-out 0.2s forwards; opacity: 0; }
            .animate-slide-up-delayed-2 { animation: slide-up 0.8s ease-out 0.4s forwards; opacity: 0; }
            .animate-wiggle { animation: wiggle 1s ease-in-out infinite; }
            .animate-tick-tock { animation: tick-tock 2s ease-in-out infinite; transform-origin: top center; }
            .animate-bounce-in { animation: bounce-in 0.6s ease-out forwards; }
            .animate-bounce-in-delayed { animation: bounce-in 0.6s ease-out 0.3s forwards; opacity: 0; }
            .animate-gradient {
                background-size: 200% 200%;
                animation: gradient-shift 4s ease infinite;
            }
            .card-hover {
                transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            }
            .card-hover:hover {
                transform: translateY(-8px) scale(1.02);
            }
            .confetti-piece {
                position: absolute;
                width: 8px;
                height: 8px;
                border-radius: 50%;
                animation: confetti-fall 3s ease-in infinite;
            }
            .fun-border {
                border: 3px solid transparent;
                background-clip: padding-box;
                position: relative;
            }
            .fun-border::before {
                content: '';
                position: absolute;
                inset: -3px;
                border-radius: inherit;
                background: linear-gradient(135deg, #f53003, #f59e03, #03b5f5, #8b03f5);
                z-index: -1;
                background-size: 300% 300%;
                animation: gradient-shift 4s ease infinite;
            }

            /* Hidden boat Easter egg */
            @keyframes sail {
                0%, 100% { transform: translateX(0) rotate(-1deg); }
                50% { transform: translateX(3px) rotate(1deg); }
            }
            @keyframes wave {
                0%, 100% { transform: scaleY(1); }
                50% { transform: scaleY(1.3); }
            }
            @keyframes boat-found-pop {
                0% { transform: scale(1); }
                30% { transform: scale(3) rotate(-10deg); }
                50% { transform: scale(2.5) rotate(5deg); }
                70% { transform: scale(2.8) rotate(-3deg); }
                100% { transform: scale(3) rotate(0deg); }
            }
            @keyframes celebration-fade {
                0% { opacity: 0; transform: translateY(10px); }
                20% { opacity: 1; transform: translateY(0); }
                80% { opacity: 1; }
                100% { opacity: 0; transform: translateY(-10px); }
            }
            @keyframes firework {
                0% { transform: scale(0); opacity: 1; }
                50% { transform: scale(1.2); opacity: 0.8; }
                100% { transform: scale(0); opacity: 0; }
            }
            .hidden-boat {
                position: fixed;
                font-size: 8px;
                cursor: default;
                opacity: 0.15;
                z-index: 10;
                animation: sail 4s ease-in-out infinite;
                transition: opacity 0.3s;
                user-select: none;
                line-height: 1;
            }
            .hidden-boat:hover {
                opacity: 0.4;
            }
            .hidden-boat.found {
                opacity: 1 !important;
                animation: boat-found-pop 0.8s ease-out forwards;
                cursor: default;
                font-size: 8px;
                z-index: 1000;
            }
            .boat-celebration {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 999;
                text-align: center;
                pointer-events: none;
                animation: celebration-fade 4s ease-in-out forwards;
            }
            .boat-celebration h2 {
                font-size: 2rem;
                font-weight: 800;
                background: linear-gradient(135deg, #f53003, #03b5f5, #f59e03);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                margin-bottom: 0.5rem;
            }
            .boat-celebration p {
                font-size: 1.1rem;
                color: #706f6c;
            }
            .firework-burst {
                position: fixed;
                font-size: 1.5rem;
                pointer-events: none;
                z-index: 998;
                animation: firework 1s ease-out forwards;
            }
        </style>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] min-h-screen flex flex-col font-[Instrument_Sans]">
        <header class="w-full max-w-5xl mx-auto px-6 py-4 text-sm not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main class="flex-1 flex flex-col items-center justify-center px-6 py-12 gap-12">
            <!-- Master of the Universe section -->
            <div class="text-center animate-slide-up relative">
                <div class="relative inline-block">
                    <span class="text-6xl md:text-8xl font-bold bg-gradient-to-r from-[#f53003] via-[#f59e03] to-[#f53003] bg-clip-text text-transparent animate-gradient" style="background-size: 200% 200%;">
                        Welcome!
                    </span>
                    <span class="absolute -top-4 -right-6 text-3xl animate-wiggle inline-block">
                        🎉
                    </span>
                </div>
                <p class="mt-4 text-lg md:text-xl text-[#706f6c] dark:text-[#A1A09A] max-w-lg mx-auto">
                    The most exciting Laravel app you've ever seen. <br>No, seriously. Try the buttons.
                </p>
            </div>

            <!-- Fun Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full max-w-3xl animate-slide-up-delayed">
                <!-- Clock Card -->
                <a href="/clock" class="card-hover block group relative overflow-hidden rounded-2xl bg-white dark:bg-[#161615] p-8 text-center fun-border">
                    <div class="relative z-10">
                        <div class="text-6xl mb-4 animate-tick-tock inline-block">
                            🕐
                        </div>
                        <h2 class="text-2xl font-bold mb-2 group-hover:text-[#f53003] dark:group-hover:text-[#FF4433] transition-colors">
                            The Clock
                        </h2>
                        <p class="text-[#706f6c] dark:text-[#A1A09A] text-sm">
                            Watch time fly by! Literally. It's a clock. But it's <em>our</em> clock, and that makes it special.
                        </p>
                        <div class="mt-4 inline-flex items-center gap-2 text-sm font-medium text-[#f53003] dark:text-[#FF4433]">
                            <span>What time is it?</span>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="transition-transform group-hover:translate-x-1">
                                <path d="M6 3L11 8L6 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                    <div class="absolute top-2 right-2 text-2xl animate-float opacity-30">⏰</div>
                    <div class="absolute bottom-2 left-2 text-xl animate-float-delayed opacity-20">⌚</div>
                </a>

                <!-- Countries Card -->
                <a href="/countries" class="card-hover block group relative overflow-hidden rounded-2xl bg-white dark:bg-[#161615] p-8 text-center fun-border">
                    <div class="relative z-10">
                        <div class="text-6xl mb-4 animate-float inline-block">
                            🌍
                        </div>
                        <h2 class="text-2xl font-bold mb-2 group-hover:text-[#f53003] dark:group-hover:text-[#FF4433] transition-colors">
                            EU Countries
                        </h2>
                        <p class="text-[#706f6c] dark:text-[#A1A09A] text-sm">
                            Decide which EU countries are truly great. The power is in your hands. Use it wisely.
                        </p>
                        <div class="mt-4 inline-flex items-center gap-2 text-sm font-medium text-[#f53003] dark:text-[#FF4433]">
                            <span>Rate the countries</span>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="transition-transform group-hover:translate-x-1">
                                <path d="M6 3L11 8L6 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                    <div class="absolute top-2 left-3 text-2xl animate-float-slow opacity-30">🇪🇺</div>
                    <div class="absolute bottom-2 right-2 text-xl animate-float opacity-20">⭐</div>
                </a>
            </div>

            <!-- Fun Footer Tagline -->
            <div class="text-center animate-slide-up-delayed-2">
                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                    Built with
                    <span class="inline-block animate-pulse text-red-500">❤️</span>
                    and
                    <span class="inline-block hover:animate-spin cursor-pointer">⚡</span>
                    using Laravel
                </p>
            </div>
        </main>

        <!-- Hidden Boat Easter Egg - Can you find it? -->
        <div id="hidden-boat" class="hidden-boat" title="🤔">⛵</div>

        <script>
            (function() {
                const boat = document.getElementById('hidden-boat');
                let found = false;

                // Place the boat in a sneaky spot
                function positionBoat() {
                    const positions = [
                        { bottom: '12px', right: '18px' },
                        { bottom: '8px', left: '14px' },
                        { top: '10px', left: '50%' },
                        { top: '45%', right: '8px' },
                        { bottom: '35%', left: '6px' },
                    ];
                    const pos = positions[Math.floor(Math.random() * positions.length)];
                    Object.assign(boat.style, { top: '', bottom: '', left: '', right: '' });
                    Object.assign(boat.style, pos);
                }

                positionBoat();

                boat.addEventListener('click', function() {
                    if (found) return;
                    found = true;
                    boat.classList.add('found');

                    // Launch firework emojis
                    const emojis = ['🎆', '🎇', '✨', '🌟', '🎊', '🎉', '⭐', '🚢', '🐟', '🐠', '🐬', '🌊'];
                    for (let i = 0; i < 16; i++) {
                        setTimeout(() => {
                            const fw = document.createElement('div');
                            fw.className = 'firework-burst';
                            fw.textContent = emojis[Math.floor(Math.random() * emojis.length)];
                            fw.style.left = (15 + Math.random() * 70) + '%';
                            fw.style.top = (15 + Math.random() * 70) + '%';
                            fw.style.animationDuration = (0.6 + Math.random() * 0.8) + 's';
                            fw.style.animationDelay = (Math.random() * 0.3) + 's';
                            document.body.appendChild(fw);
                            setTimeout(() => fw.remove(), 2000);
                        }, i * 100);
                    }

                    // Show celebration message
                    setTimeout(() => {
                        const msg = document.createElement('div');
                        msg.className = 'boat-celebration';
                        msg.innerHTML = '<h2>You found the boat!</h2><p>Captain, welcome aboard! 🚢</p>';
                        document.body.appendChild(msg);
                        setTimeout(() => msg.remove(), 4500);
                    }, 400);
                });
            })();
        </script>
    </body>
</html>
