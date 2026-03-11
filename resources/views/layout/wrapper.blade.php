@props([
    'id' => null,
    'class' => null,
])

@php
    $class .= ' wrapper';
@endphp

<div
    @if($id) id="{{ $id }}" @endif
    @if($class) class="{{ trim($class) }}" @endif>
    {{ $slot }}
</div>
