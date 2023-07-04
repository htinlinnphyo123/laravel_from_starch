@props(['active'=>false])

@php
    $classes = "block text-sm px-5 py-2 text-left focus:outline-none focus:bg-gray-300 hover:bg-gray-300";

    if ($active) $classes .= " bg-blue-400 focus:bg-blue-500 hover:bg-blue-500"

@endphp

<a {{ $attributes(['class'=>$classes]) }}>
    {{ $slot }}
</a>