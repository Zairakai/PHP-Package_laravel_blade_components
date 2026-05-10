@props([
    'type' => 'button',
    'form' => null,
    'name' => null,
    'value' => null,
    'disabled' => false,
    'autofocus' => false,
    'class' => null,
    'field' => true,
    'fieldClass' => null,
    'icon' => null,
])

@php
    use Zairakai\LaravelBladeComponents\BladeHelpers;

    $field = filter_var($field, FILTER_VALIDATE_BOOLEAN);
    $value = BladeHelpers::getOldValue($name, $value);
@endphp

@if ($field)
    <x-form.field class="{{ $fieldClass }}">
@endif
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
@if ($field)
    </x-form.field>
@endif
