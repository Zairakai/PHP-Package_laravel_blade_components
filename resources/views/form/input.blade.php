@props([
    "type" => "text",
    "id" => null,
    "form" => null,
    "name" => null,
    "value" => null,
    "placeholder" => null,
    "list" => null,
    "required" => false,
    "checked" => false,
    "autocomplete" => null,
    "pattern" => null,
    "min" => null,
    "max" => null,
    "step" => null,
    "maxlength" => null,
    "accept" => null,
    "disabled" => false,
    "readonly" => false,
    "multiple" => false,
    "autofocus" => false,
    "class" => null,
    "width" => null,
    "height" => null,
    "size" => null,
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

    // Only auto-generate an id when a label is present.
    // An explicitly passed id is always preserved regardless of label.
    if (! is_null($label)) {
        if (is_null($name) && is_null($id)) {
            $id = \Illuminate\Support\Str::random(40);
        } elseif (is_null($id)) {
            $id = $name;
        }
    }

    $field = filter_var($field, FILTER_VALIDATE_BOOLEAN);
    $labelBefore = filter_var($labelBefore, FILTER_VALIDATE_BOOLEAN);
    $value = BladeHelpers::getOldValue($name, $value);

    if ($errors->has($name)) {
        $supportingText = $errors->first($name);
    }

    if ("hidden" === $type) {
        $autocomplete = null;
    }
@endphp

<x-form.field
    name="{{ $name }}"
    class="{{ trim($fieldClass) }}"
    :field="$field">
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

        <input
            type="{{ $type }}"
            @if($id) id="{{ $id }}" @endif
            @if($placeholder) placeholder="{{ $placeholder }}" @endif
            @if($form) form="{{ $form }}" @endif
            @if($name) name="{{ $name }}" @endif
            @if(! is_null($value)) value="{{ $value }}" @endif
            @if($list) list="{{ $list }}" @endif
            @if($required) required aria-required="true" @endif
            @if($checked) checked @endif
            @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
            @if($pattern) pattern="{{ $pattern }}" @endif
            @if($min) min="{{ $min }}" @endif
            @if($max) max="{{ $max }}" @endif
            @if($step) step="{{ $step }}" @endif
            @if($maxlength) maxlength="{{ $maxlength }}" @endif
            @if($accept) accept="{{ $accept }}" @endif
            @if($disabled) disabled @endif
            @if($readonly) readonly @endif
            @if($multiple) multiple @endif
            @if($autofocus) autofocus @endif
            @if($class) class="{{ $class }}" @endif
            @if($width) width="{{ $width }}" @endif
            @if($height) height="{{ $height }}" @endif
            @if($size) size="{{ $size }}" @endif
            {{ $attributes }}>

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
