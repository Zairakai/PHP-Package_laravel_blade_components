@props([
    'min' => config('blade-components.password.min_characters', 8),
])

@php
    $pattern = '^.{' . $min . ',}$';
@endphp

<x-form.input
    type="password"
    :min="$min"
    :pattern="$pattern"
    :attributes="$attributes" />
