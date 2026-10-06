@props([
    'class' => null,
    'label' => null,
])

<div
    role="group"
    aria-roledescription="slide"
    @if ($label) aria-label="{{ $label }}" @endif
    {{ $attributes->merge(['class' => trim('carousel-slide ' . $class)]) }}>{{ $slot }}</div>
