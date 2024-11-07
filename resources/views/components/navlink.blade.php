<li class="p-2">
    <a {{ $attributes }}
        class="{{ $active ? 'bg-gray-400' : 'bg-gray-300' }}
         flex justify-start items-center h-10 w-full rounded-lg hover:bg-gray-400 "
        aria-current="{{ $active ? 'page' : false }}">
        {{ $slot }}
    </a>
</li>
