<a {{ $attributes->merge(['class' => 'inline-flex cursor-pointer items-center px-4 py-2 bg-transparent border border-gray-300 text-gray-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
