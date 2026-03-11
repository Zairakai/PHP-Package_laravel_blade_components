@props([
    'id' => null,
    'class' => null,
    'row' => 'row',
])

@php
    $class = trim($row . ' ' . $class);
@endphp

<div
    @if($id) id="{{ $id }}" @endif
    class="{{ $class }}">
    {{ $slot }}
</div>
