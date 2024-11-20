<a {{ $attributes }}
    class="
        {{ $active ? 'bg-gray-400 rounded-full text-white hover:bg-gray-200 hover:text-black' : 'bg-gray-300 hover:bg-gray-200' }}
        py-2 px-3 font-normal text-sm xl:text-md 2xl:text-lg  
    "
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
