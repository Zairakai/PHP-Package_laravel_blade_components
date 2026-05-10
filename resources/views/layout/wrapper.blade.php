@props(['class' => null])

@php
    $baseClass = trim('wrapper' . ($class ? ' ' . $class : ''));
@endphp

<div {{ $attributes->merge(['class' => $baseClass]) }}>
    {{ $slot }}
</div>
