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
    "labelAfter" => false,
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
    $id = $id ?? $name;
    $value = BladeHelpers::getOldValue($name, $value);

    // Forward data-*, aria-* and Alpine (x-*, @*) attributes to the <textarea>.
    $dynamicAttributes = $attributes->filter(fn ($value, $key) =>
        str_starts_with($key, "data-") ||
        str_starts_with($key, "aria-") ||
        str_starts_with($key, "x-") ||
        str_starts_with($key, "@")
    );

    if ($errors->has($name)) {
        $supportingText = $errors->first($name);
    }
@endphp

<x-form.field
    :field="$field"
    class="{{ $fieldClass }}">
    @if ($field && $label && ! $labelAfter)
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
            @if(isset($form)) form="{{ $form }}" @endif
            @if(isset($required) && $required) required aria-required="true" @endif
            @if(isset($disabled) && $disabled) disabled @endif
            @if(isset($readonly) && $readonly) readonly @endif
            @if(isset($autofocus) && $autofocus) autofocus @endif
            @if(isset($class)) class="{{ $class }}" @endif
            @if(isset($rows)) rows="{{ $rows }}" @endif
            @if(isset($cols)) cols="{{ $cols }}" @endif
            @if(isset($maxlength)) maxlength="{{ $maxlength }}" @endif
            @if(isset($wrap)) wrap="{{ $wrap }}" @endif
            @if(isset($dirname)) dirname="{{ $dirname }}" @endif
            @foreach ($dynamicAttributes as $key => $value)
                {{ $key }}="{{ $value }}"
            @endforeach>
            {{ $value }}
        </textarea>

        @if ($suffix)
            <span data-suffix>{{ $suffix }}</span>
        @endif

        @if ($iconAfter)
            <span data-trailing-icon>{{ $iconAfter }}</span>
        @endif
    </div>

    @if ($field && $label && $labelAfter)
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
