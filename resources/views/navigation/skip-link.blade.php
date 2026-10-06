@props([
    'class' => null,
    'href' => '#main',
])

<a href="{{ $href }}" {{ $attributes->merge(['class' => trim('skip-link ' . $class)]) }}>{{ $slot->isNotEmpty() ? $slot : 'Skip to the content' }}</a>
