@props(['class' => null, 'col' => 'col'])

@php
    $baseClass = trim($col . ($class ? ' ' . $class : ''));
@endphp

<div {{ $attributes->merge(['class' => $baseClass]) }}>
    {{ $slot }}
</div>
