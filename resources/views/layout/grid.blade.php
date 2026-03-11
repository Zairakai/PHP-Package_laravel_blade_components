@props([
    'id' => null,
    'class' => null,
    'columns' => null,
])

@php
    $class = $class ?? 'grid';

    if (! is_null($columns)) {
        $class .= ' grid-cols-' . $columns;
    }
@endphp

<div
    @if($id) id="{{ $id }}" @endif
    class="{{ trim($class) }}">
    {{ $slot }}
</div>
