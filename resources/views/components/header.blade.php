{{-- Component Header --}}
<header class="flex justify-between items-center w-full h-14 pl-4 pr-20 bg-gray-400">
    <section class="flex items-center gap-2">
        {{-- Hamburger menu --}}
        <button type="button" class="flex flex-col box-border rounded-md">
            <span class="w-5 h-1 bg-gray-500 mb-1"></span>
            <span class="w-5 h-1 bg-gray-500 mb-1"></span>
            <span class="w-5 h-1 bg-gray-500"></span>
        </button>
        {{-- Logo --}}
        <div class="flex items-center text-lg font-bold">
            <img src="{{ Vite::asset('public/images/logo3.png') }}" alt="" class="w-10 h-10 rounded-full">
            <h1>GSI</h1>
        </div>
    </section>
    <section class="flex items-center gap-4 w-8 h-8 rounded-full">
        {{-- Link logout --}}
        <a href="{{ url('/logout') }}"
            class="p-1 bg-violet-500 border border-black shadow shadow-violet-950 rounded-md text-sm hover:bg-violet-700">
            Logout
        </a>
        {{-- Profile --}}
        @auth
            <img src="{{ auth()->user()->image === null ? asset('images/profile_default.png') : auth()->user()->image }}"
                alt="profile" class="w-full rounded-full">
        @endauth
    </section>
</header>
