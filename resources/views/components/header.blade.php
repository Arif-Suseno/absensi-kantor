{{-- Component Header --}}
<header class="flex justify-between items-center w-full h-14 px-4 bg-slate-100 shadow-md">
    {{-- Left Section --}}
    <section class="flex items-center gap-4 justify-start">
        {{-- Hamburger Menu --}}
        <button type="button" class="flex flex-col justify-center items-center rounded-md focus:outline-none">
            <span class="w-5 h-1 bg-gray-500 mb-1"></span>
            <span class="w-5 h-1 bg-gray-500 mb-1"></span>
            <span class="w-5 h-1 bg-gray-500"></span>
        </button>
        {{-- Logo --}}
        <div class="flex items-center text-lg font-bold">
            <img src="{{ Vite::asset('public/images/logo3.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
            <h1 class="ml-2 text-gray-800">GSI</h1>
        </div>
    </section>


    {{-- Right Section --}}
    <section class="flex items-center gap-4 justify-end">
        {{-- Link Logout --}}
        <a href="{{ url('/logout') }}"
            class="px-4 py-2 bg-red-600 text-white font-semibold border border-transparent rounded-full shadow-md shadow-red-500/50 hover:bg-red-700 hover:red-violet-700/50 focus:ring-2 focus:ring-violet-300 transition-all duration-300 ease-in-out transform hover:scale-105">
            Logout
        </a>
        {{-- Profile --}}
        @auth
            <a href="{{ route('profil') }}">
                <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('images/profile_default.png') }}"
                    alt="profile"
                    class="w-10 h-10 object-cover rounded-full shadow-md hover:shadow-lg transition-shadow duration-300 ease-in-out">
            </a>
        @endauth
    </section>
</header>
