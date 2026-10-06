@props([
    'class' => null,
])

<ol {{ $attributes->merge(['class' => trim('timeline ' . $class)]) }}>{{ $slot }}</ol>
