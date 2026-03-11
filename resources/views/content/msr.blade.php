@props([
    'class' => null,
])

@php
    $class .= ' msr';
@endphp

<span @if($class) class="{{ trim($class) }}" @endif>
    {{ $slot }}
</span>
