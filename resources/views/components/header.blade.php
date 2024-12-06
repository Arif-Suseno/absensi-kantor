{{-- Component Header --}}
<header class="flex justify-between items-center w-full h-14 px-4  bg-gray-300">
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
    <section class="flex items-center gap-4 rounded-full">
        {{-- Link logout --}}
        <a href="{{ url('/logout') }}"
            class="p-1 bg-orange-400 border border-black shadow shadow-orange-900 rounded-md text-sm hover:bg-orange-500">
            Logout
        </a>
        {{-- Profile --}}
        @auth
            <a href="{{ route('karyawan.profil') }}">
                <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('images/profile_default.png') }}"
                    alt="profile" class="w-10 aspect-square rounded-full">
            </a>
        @endauth
    </section>
</header>
