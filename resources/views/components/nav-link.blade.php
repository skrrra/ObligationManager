@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center py-3 px-8 bg-gray-200 text-gray-700 border-r-4 border-gray-700'
            : 'flex items-center py-3 px-8 text-gray-700 hover:bg-gray-200 border-r-4 hover:border-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
