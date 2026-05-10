@props([
    "id" => null,
    "name" => null,
    "field" => true,
])

@php
    $field = filter_var($field, FILTER_VALIDATE_BOOLEAN);
    $id = $id ?? $name;
@endphp

@if ($field)
    <x-form.input
        type="checkbox"
        :id="$id"
        :name="$name"
        :field="$field"
        :attributes="$attributes" />
@else
    <input
        type="checkbox"
        id="{{ $id }}"
        @if($name) name="{{ $name }}" @endif
        {{ $attributes }}>
@endif
