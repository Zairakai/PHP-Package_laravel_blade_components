@props([
    'class' => null,
    'href' => '#top',
    'label' => 'Back to top',
])

<a href="{{ $href }}" aria-label="{{ $label }}" {{ $attributes->merge(['class' => trim('back-to-top ' . $class)]) }}>{{ $slot->isNotEmpty() ? $slot : '↑' }}</a>
