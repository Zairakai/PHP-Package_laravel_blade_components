@props([
    'class' => null,
    'label' => null,
])

<div role="group" @if ($label) aria-label="{{ $label }}" @endif {{ $attributes->merge(['class' => trim('chip-group ' . $class)]) }}>{{ $slot }}</div>
