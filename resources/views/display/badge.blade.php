@props([
    'class' => null,
    'variant' => 'default',
    'size' => 'medium',
    'dot' => false,
])

<span {{ $attributes->merge(['class' => trim('badge ' . $class)])->merge(['data-variant' => $variant, 'data-size' => $size]) }} @if($dot) data-dot @endif>{{ $slot }}</span>
