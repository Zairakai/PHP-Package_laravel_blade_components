@props([
    'class' => null,
    'value',
    'min' => 0,
    'max' => 100,
    'low' => null,
    'high' => null,
    'optimum' => null,
    'label' => null,
])

<meter
    value="{{ $value }}"
    min="{{ $min }}"
    max="{{ $max }}"
    @if (null !== $low) low="{{ $low }}" @endif
    @if (null !== $high) high="{{ $high }}" @endif
    @if (null !== $optimum) optimum="{{ $optimum }}" @endif
    @if ($label) aria-label="{{ $label }}" @endif
    {{ $attributes->merge(['class' => trim('meter ' . $class)]) }}>{{ $slot->isNotEmpty() ? $slot : $value }}</meter>
