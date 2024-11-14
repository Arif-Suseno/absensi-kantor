{{-- Component Header --}}
<header class="flex flex-row justify-between w-full h-12 items-center bg-gray-300">
    <section class="flex">
        {{-- Hamburger menu --}}
        <button type="button" class="flex flex-col m-2 p-1 box-border rounded-md">
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
    {{-- Profile --}}
    <div class="w-8 h-8 rounded-full m-2">
        <img src="{{ Vite::asset('public/images/logo.jpg') }}" alt="profile" class="w-full rounded-full">
    </div>
</header>
