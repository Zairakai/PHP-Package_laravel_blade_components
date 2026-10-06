@props([
    'class' => null,
])

<div {{ $attributes->merge(['class' => trim('flex ' . $class)]) }}>{{ $slot }}</div>
