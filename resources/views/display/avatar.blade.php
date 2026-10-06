@props([
    'class' => null,
    'src' => null,
    'name' => null,
    'alt' => null,
    'size' => 'medium',
    'shape' => 'circle',
])

@php
    $initials = $name
        ? collect(preg_split('/\s+/', trim($name)))->filter()->take(2)->map(fn ($word) => mb_strtoupper(mb_substr($word, 0, 1)))->implode('')
        : null;
@endphp

<span
    role="img"
    aria-label="{{ $alt ?? $name }}"
    data-size="{{ $size }}"
    data-shape="{{ $shape }}"
    {{ $attributes->merge(['class' => trim('avatar ' . $class)]) }}>
    @if ($src)
        <img src="{{ $src }}" alt="" loading="lazy">
    @elseif ($initials)
        <span aria-hidden="true">{{ $initials }}</span>
    @else
        {{ $slot }}
    @endif
</span>
