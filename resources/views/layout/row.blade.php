@props(['class' => null, 'row' => 'row'])

@php
    $baseClass = trim($row . ($class ? ' ' . $class : ''));
@endphp

<div {{ $attributes->merge(['class' => $baseClass]) }}>
    {{ $slot }}
</div>
