<a {{ $attributes }}
    class="
        {{ $active ? 'bg-gray-400 rounded-full text-white hover:text-black' : 'bg-gray-300 hover:bg-gray-200' }}
        h-10 pt-3 px-6 font-normal text-sm sm:text-sm md:text-lg md:pt-1 
    "
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
