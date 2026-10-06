@props([
    'class' => null,
    'label' => 'Main',
])

<nav aria-label="{{ $label }}" {{ $attributes->merge(['class' => trim('bottom-navigation ' . $class)]) }}>{{ $slot }}</nav>
