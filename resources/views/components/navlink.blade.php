<a {{ $attributes }}
    class="
        {{ $active ? 'bg-gray-400 rounded-full text-blue-800 hover:bg-gray-500 hover:text-black' : 'bg-gray-400 hover:bg-gray-500' }}
        py-2 px-3 font-normal text-sm xl:text-md 2xl:text-lg  
    "
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
