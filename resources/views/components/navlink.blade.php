<a {{ $attributes }}
    class="
        {{ $active ? 'bg-slate-400 rounded-full text-blue-800 hover:bg-gray-500 hover:text-black' : 'bg-slate-100 hover:bg-gray-300' }}
        py-2 px-3 font-normal text-sm xl:text-md 2xl:text-lg  
    "
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
