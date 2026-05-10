@props(['class' => null, 'columns' => null])

@php
    $baseClass = $class ?? 'grid';

    if (! is_null($columns)) {
        $baseClass .= ' grid-cols-' . $columns;
    }
@endphp

<div {{ $attributes->merge(['class' => trim($baseClass)]) }}>
    {{ $slot }}
</div>
