@props([
    'name' => null,
    'class' => null,
    'field' => true,
])

@php
    $field = filter_var($field, FILTER_VALIDATE_BOOLEAN);

    $classes = 'field';

    if (isset($class)) {
        $classes .= ' ' . $class;
    }

    if (isset($name) && $errors->has($name)) {
        $classes .= ' error';
    }
@endphp

@if ($field)
    <div class="{{ trim($classes) }}">
        {{ $slot }}
    </div>
@else
    {{ $slot }}
@endif
