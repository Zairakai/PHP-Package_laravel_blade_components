@props([
    'class' => null,
    'placement' => 'bottom-end',
    'label' => 'Notifications',
])

<div role="region" aria-label="{{ $label }}" aria-live="polite" data-placement="{{ $placement }}" {{ $attributes->merge(['class' => trim('toast-container ' . $class)]) }}>{{ $slot }}</div>
