@props(['value'])

<label {{ $attributes->merge(['class' => 'text-sm font-medium leading-4 text-gray-700 text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
