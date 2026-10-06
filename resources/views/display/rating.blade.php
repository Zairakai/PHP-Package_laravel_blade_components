@props([
    'class' => null,
    'value' => 0,
    'max' => 5,
    'label' => null,
])

@php
    $label ??= $value . ' / ' . $max;
@endphp

<span role="img" aria-label="{{ $label }}" data-value="{{ $value }}" {{ $attributes->merge(['class' => trim('rating ' . $class)]) }}>
    @for ($star = 1; $star <= $max; $star++)
        <span class="rating-star" data-state="{{ $value >= $star ? 'full' : ($value >= $star - 0.5 ? 'half' : 'empty') }}" aria-hidden="true">★</span>
    @endfor
</span>
