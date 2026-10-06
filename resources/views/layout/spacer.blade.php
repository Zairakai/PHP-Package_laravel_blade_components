@props([
    'class' => null,
])

<div aria-hidden="true" {{ $attributes->merge(['class' => trim('spacer ' . $class)]) }}></div>
