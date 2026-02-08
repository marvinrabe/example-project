<nav class="w-full max-w-5xl mx-auto px-6 py-4 font-[Instrument_Sans]">
    <ul class="flex items-center justify-center gap-1 flex-wrap text-sm">
        <li>
            <a href="/"
               class="inline-block px-4 py-1.5 rounded-sm transition-colors {{ request()->is('/') ? 'text-[#f53003] font-semibold' : 'text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC]' }}">
                Home
            </a>
        </li>
        <li>
            <a href="/clock"
               class="inline-block px-4 py-1.5 rounded-sm transition-colors {{ request()->is('clock') ? 'text-[#f53003] font-semibold' : 'text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC]' }}">
                Clock
            </a>
        </li>
        <li>
            <a href="/duck"
               class="inline-block px-4 py-1.5 rounded-sm transition-colors {{ request()->is('duck') ? 'text-[#f53003] font-semibold' : 'text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC]' }}">
                Duck
            </a>
        </li>
        <li>
            <a href="/empty"
               class="inline-block px-4 py-1.5 rounded-sm transition-colors {{ request()->is('empty') ? 'text-[#f53003] font-semibold' : 'text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC]' }}">
                Empty
            </a>
        </li>
        <li>
            <a href="/countries"
               class="inline-block px-4 py-1.5 rounded-sm transition-colors {{ request()->is('countries*') ? 'text-[#f53003] font-semibold' : 'text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC]' }}">
                Countries
            </a>
        </li>
    </ul>
</nav>
