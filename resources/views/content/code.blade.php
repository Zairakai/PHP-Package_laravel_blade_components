@props([
    'class' => null,
])

<code {{ $attributes->merge(['class' => trim('code ' . $class)]) }}>{{ $slot }}</code>
