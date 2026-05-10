@props([
    "id" => null,
    "name" => null,
    "field" => true,
])

@php
    $field = filter_var($field, FILTER_VALIDATE_BOOLEAN);
    $id = $id ?? $name;
    $dynamicAttributes = $attributes->filter(fn ($value, $key) =>
        str_starts_with($key, "data-") || str_starts_with($key, "aria-")
    );
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
        {{ $attributes->only(['value', 'checked', 'required', 'disabled', 'autofocus']) }}
        @foreach ($dynamicAttributes as $key => $value)
            {{ $key }}="{{ $value }}"
        @endforeach >
@endif
