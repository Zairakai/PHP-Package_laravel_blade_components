@props(['class' => null])

@php
    $baseClass = trim('container' . ($class ? ' ' . $class : ''));
@endphp

<div {{ $attributes->merge(['class' => $baseClass]) }}>
    {{ $slot }}
</div>
