@props([
    'id' => null,
    'name' => null,
    'form' => null,
    'options' => [],
    'selected' => null,
    'multiple' => false,
    'required' => false,
    'disabled' => false,
    'autofocus' => false,
    'class' => null,
    'label' => null,
    'labelBefore' => false,
    'fieldClass' => null,
    'field' => true,
    'iconBefore' => null,
    'iconAfter' => config('blade-components.select.icon_after', 'keyboard_arrow_down'),
    'supportingText' => null,
    'supportingCounter' => null,
])

@php
    $field = filter_var($field, FILTER_VALIDATE_BOOLEAN);
    $labelBefore = filter_var($labelBefore, FILTER_VALIDATE_BOOLEAN);
    $id = $id ?? $name;

    $options = collect($options);

    $needDefaultOption =
        $required &&
        ! $options->contains(function (mixed $value) {
            return ! is_array($value);
        });

    // Resolve once to avoid calling old() on every option iteration.
    // Cast to string so comparisons against integer keys don't produce
    // false positives (null == 0 is true in PHP loose comparison).
    $resolvedSelected = old($name, $selected);
    $resolvedSelected = is_null($resolvedSelected) ? null : (string) $resolvedSelected;

    if ($errors->has($name)) {
        $supportingText = $errors->first($name);
    }
@endphp

<x-form.field
    name="{{ $name }}"
    class="{{ $fieldClass }}"
    :field="$field">
    @if ($field && $label && $labelBefore)
        <x-form.label
            :label="$label"
            :name="$name"
            :id="$id"
            :iconBefore="$iconBefore"
            :iconAfter="$iconAfter" />
    @endif

    <div data-input>
        @if ($iconBefore)
            <span data-leading-icon>{{ $iconBefore }}</span>
        @endif

        <select
            id="{{ $id }}"
            name="{{ $name }}{{ $multiple ? '[]' : '' }}"
            @if($form) form="{{ $form }}" @endif
            @if($required) required aria-required="true" @endif
            @if($multiple) multiple @endif
            @if($disabled) disabled @endif
            @if($autofocus) autofocus @endif
            @if($class) class="{{ $class }}" @endif {{ $attributes }}>
            @foreach ($options as $optionKey => $optionValue)
                @if ($loop->first && $needDefaultOption)
                    <option value="">
                        {{ __('zairakai::layout.select.default') }}
                    </option>
                @endif

                @if (is_array($optionValue))
                    <optgroup label="{{ $optionKey }}">
                        @foreach ($optionValue as $optionValueValue => $optionValueLabel)
                            <option
                                value="{{ $optionValueValue }}"
                                {{ ! is_null($resolvedSelected) && $resolvedSelected === (string) $optionValueValue ? 'selected' : '' }}>
                                {{ $optionValueLabel }}
                            </option>
                        @endforeach
                    </optgroup>
                @else
                    <option
                        value="{{ $optionKey }}"
                        {{ ! is_null($resolvedSelected) && $resolvedSelected === (string) $optionKey ? 'selected' : '' }}>
                        {{ $optionValue }}
                    </option>
                @endif
            @endforeach
        </select>

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
            :iconAfter="$iconAfter" />
    @endif

    @if ($field)
        <x-form.additional
            :text="$supportingText"
            :counter="$supportingCounter" />
    @endif
</x-form.field>
