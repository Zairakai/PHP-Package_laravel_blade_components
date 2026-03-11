@props([
    'id' => null,
    'class' => null,
    'role' => null,
])

@php
    $class .= ' container';
@endphp

<div
    @if($id) id="{{ $id }}" @endif
    @if($class) class="{{ trim($class) }}" @endif
    @if($role) role="{{ $role }}" @endif>
    {{ $slot }}
</div>
