@props([
    'id' => null,
    'type' => 'button',
    'form' => null,
    'name' => null,
    'value' => null,
    'disabled' => false,
    'autofocus' => false,
    'class' => null,
    'fieldClass' => null,
    'icon' => null,
])

@php
    use Zairakai\LaravelBladeComponents\BladeHelpers;

    $value = BladeHelpers::getOldValue($name, $value);
@endphp

<x-form.field class="{{ $fieldClass }}">
    <button
        type="{{ $type }}"
        @if(isset($id)) id="{{ $id }}" @endif
        @if(isset($form)) form="{{ $form }}" @endif
        @if(isset($name)) name="{{ $name }}" @endif
        @if(isset($value)) value="{{ $value }}" @endif
        @if(isset($disabled) && $disabled) disabled @endif
        @if(isset($autofocus) && $autofocus) autofocus @endif
        @if(isset($class)) class="{{ $class }}" @endif
        @if(isset($icon)) data-icon="{{ $icon }}" @endif>
        {{ $slot }}
    </button>
</x-form.field>
