@props([
    "id" => null,
    "name" => null,
    "form" => null,
    "value" => null,
    "placeholder" => null,
    "required" => false,
    "disabled" => false,
    "readonly" => false,
    "autofocus" => false,
    "class" => null,
    "rows" => null,
    "cols" => null,
    "maxlength" => null,
    "wrap" => null,
    "dirname" => null,
    "label" => null,
    "labelBefore" => false,
    "fieldClass" => null,
    "iconBefore" => null,
    "iconAfter" => null,
    "field" => true,
    "prefix" => null,
    "suffix" => null,
    "supportingText" => null,
    "supportingCounter" => null,
])

@php
    use Zairakai\LaravelBladeComponents\BladeHelpers;

    $field = filter_var($field, FILTER_VALIDATE_BOOLEAN);
    $labelBefore = filter_var($labelBefore, FILTER_VALIDATE_BOOLEAN);
    $id = $id ?? $name;
    $value = BladeHelpers::getOldValue($name, $value);

    if ($errors->has($name)) {
        $supportingText = $errors->first($name);
    }
@endphp

<x-form.field
    :field="$field"
    class="{{ $fieldClass }}">
    @if ($field && $label && $labelBefore)
        <x-form.label
            :label="$label"
            :name="$name"
            :id="$id"
            :iconBefore="$iconBefore"
            :iconAfter="$iconAfter"
            :prefix="$prefix"
            :suffix="$suffix" />
    @endif

    <div data-input>
        @if ($iconBefore)
            <span data-leading-icon>{{ $iconBefore }}</span>
        @endif

        @if ($prefix)
            <span data-prefix>{{ $prefix }}</span>
        @endif

        <textarea
            id="{{ $id }}"
            name="{{ $name }}"
            @if($placeholder) placeholder="{{ $placeholder }}" @endif
            @if($form) form="{{ $form }}" @endif
            @if($required) required aria-required="true" @endif
            @if($disabled) disabled @endif
            @if($readonly) readonly @endif
            @if($autofocus) autofocus @endif
            @if($class) class="{{ $class }}" @endif
            @if($rows) rows="{{ $rows }}" @endif
            @if($cols) cols="{{ $cols }}" @endif
            @if($maxlength) maxlength="{{ $maxlength }}" @endif
            @if($wrap) wrap="{{ $wrap }}" @endif
            @if($dirname) dirname="{{ $dirname }}" @endif
            {{ $attributes }}>
            {{ $value }}
        </textarea>

        @if ($suffix)
            <span data-suffix>{{ $suffix }}</span>
        @endif

        @if ($iconAfter)
            <span data-trailing-icon>{{ $iconAfter }}</span>
        @endif
    </div>

    @if ($field && $label && ! $labelBefore)
        <x-form.label
            :label="$label"
            :name="$name"
            :id="$id"
            :iconBefore="$iconBefore"
            :iconAfter="$iconAfter"
            :prefix="$prefix"
            :suffix="$suffix" />
    @endif

    @if ($field)
        <x-form.additional
            :text="$supportingText"
            :counter="$supportingCounter" />
    @endif
</x-form.field>
