@props([
    'class' => null,
])

<div {{ $attributes->merge(['class' => trim('flex-item ' . $class)]) }}>{{ $slot }}</div>
