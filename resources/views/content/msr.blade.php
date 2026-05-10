@props(['class' => null])

@php
    $baseClass = trim('msr' . ($class ? ' ' . $class : ''));
@endphp

<span {{ $attributes->merge(['class' => $baseClass]) }}>
    {{ $slot }}
</span>
