@props([
    'type' => 'button',
    'form' => null,
    'name' => null,
    'value' => null,
    'disabled' => false,
    'autofocus' => false,
    'class' => null,
    'field' => false,
    'fieldClass' => null,
    'icon' => null,
])

@php
    use Zairakai\LaravelBladeComponents\BladeHelpers;

    $field    = filter_var($field, FILTER_VALIDATE_BOOLEAN);
    $disabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);
    $autofocus = filter_var($autofocus, FILTER_VALIDATE_BOOLEAN);
    $value    = BladeHelpers::getOldValue($name, $value);
@endphp

<x-form.field
    class="{{ $fieldClass }}"
    :field="$field">
    <button
        type="{{ $type }}"
        {{ $attributes->merge(['class' => $class]) }}
        @if($form) form="{{ $form }}" @endif
        @if($name) name="{{ $name }}" @endif
        @if(! is_null($value)) value="{{ $value }}" @endif
        @if($disabled) disabled @endif
        @if($autofocus) autofocus @endif
        @if($icon) data-icon="{{ $icon }}" @endif>
        {{ $slot }}
    </button>
</x-form.field>
