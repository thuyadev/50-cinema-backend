@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full transition duration-75 rounded-lg shadow-sm disabled:opacity-70 bg-gray-700 text-white focus:border-cyan-600 border-gray-300 border-gray-600']) !!}>
