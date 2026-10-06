@props([
    'class' => null,
    'edge' => 'top',
    'as' => 'div',
])

<{{ $as }} data-sticky data-edge="{{ $edge }}" {{ $attributes->merge(['class' => trim('sticky ' . $class)]) }}>{{ $slot }}</{{ $as }}>
