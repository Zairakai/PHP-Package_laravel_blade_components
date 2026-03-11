@props([
    'level' => 1,
    'id' => null,
    'class' => null,
])

@php
    $tag = 'h' . min(max($level, 1), 6); // Ensure the level is between 1 and 6
@endphp

<{{ $tag }}
    @if($id) id="{{ $id }}" @endif
    @if($class) class="{{ $class }}" @endif>
    {{ $slot }}
</{{ $tag }}>
