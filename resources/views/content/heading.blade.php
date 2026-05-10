@props(['level' => 1, 'class' => null])

@php
    $tag = 'h' . min(max((int) $level, 1), 6);
@endphp

<{{ $tag }} {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</{{ $tag }}>
