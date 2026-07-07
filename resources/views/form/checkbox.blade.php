@props([
    "id" => null,
    "name" => null,
    "field" => true,
    // Checkboxes read as "[ ] Label", not "Label [ ]" — override the
    // input default (label before) regardless of it.
    "labelBefore" => false,
])

@php
    $field = filter_var($field, FILTER_VALIDATE_BOOLEAN);
    $labelBefore = filter_var($labelBefore, FILTER_VALIDATE_BOOLEAN);
    $id = $id ?? $name;
@endphp

@if ($field)
    <x-form.input
        type="checkbox"
        :id="$id"
        :name="$name"
        :field="$field"
        :labelBefore="$labelBefore"
        :attributes="$attributes" />
@else
    <input
        type="checkbox"
        id="{{ $id }}"
        @if($name) name="{{ $name }}" @endif
        {{ $attributes }}>
@endif
