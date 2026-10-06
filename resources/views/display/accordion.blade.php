@props([
    'class' => null,
])

<div {{ $attributes->merge(['class' => trim('accordion ' . $class)]) }}>{{ $slot }}</div>
