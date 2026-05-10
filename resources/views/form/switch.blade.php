@props([
    'id' => null,
    'name' => null,
    'value' => null,
    'checked' => false,
    'class' => null,
    'label' => null,
    'field' => true,
    'fieldClass' => null,
])

@php
    $classField = 'switch';

    if (isset($fieldClass)) {
        $classField .= ' ' . $fieldClass;
    }
@endphp

<x-form.checkbox
    :id="$id"
    :name="$name"
    :value="$value"
    :checked="$checked"
    :class="$class"
    :label="$label"
    :field="$field"
    :fieldClass="$classField"
    :attributes="$attributes" />
