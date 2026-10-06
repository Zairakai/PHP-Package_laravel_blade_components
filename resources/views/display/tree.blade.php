@props([
    'class' => null,
    'label' => null,
])

<ul @if ($label) aria-label="{{ $label }}" @endif {{ $attributes->merge(['class' => trim('tree ' . $class)]) }}>{{ $slot }}</ul>
