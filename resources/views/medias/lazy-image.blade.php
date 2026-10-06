@props([
    'class' => null,
    'src',
    'alt' => '',
    'srcset' => null,
    'sizes' => null,
    'eager' => false,
    'fit' => 'cover',
])

<img
    src="{{ $src }}"
    alt="{{ $alt }}"
    @if ($srcset) srcset="{{ $srcset }}" @endif
    @if ($sizes) sizes="{{ $sizes }}" @endif
    loading="{{ $eager ? 'eager' : 'lazy' }}"
    decoding="async"
    data-fit="{{ $fit }}"
    {{ $attributes->merge(['class' => trim('lazy-image ' . $class)]) }}>
