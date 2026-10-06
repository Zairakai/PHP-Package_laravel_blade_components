@props([
    'class' => null,
    'label' => null,
])

<div
    role="region"
    aria-roledescription="carousel"
    @if ($label) aria-label="{{ $label }}" @endif
    tabindex="0"
    {{ $attributes->merge(['class' => trim('carousel ' . $class)]) }}>{{ $slot }}</div>
