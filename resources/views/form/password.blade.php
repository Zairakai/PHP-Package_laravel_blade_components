@props([
    'min' => config('blade-components.password.min_characters', 8),
    'showToggle' => config('blade-components.password.show_toggle', true),
])

@php
    $pattern = '^.{' . $min . ',}$';
    $showToggle = filter_var($showToggle, FILTER_VALIDATE_BOOLEAN);
@endphp

@if ($showToggle)
    <div x-data="{ show: false }" data-password-toggle>
        <x-form.input
            type="password"
            x-bind:type="show ? 'text' : 'password'"
            :pattern="$pattern"
            :attributes="$attributes" />
        <button
            type="button"
            data-toggle-visibility
            data-label-show="{{ __('zairakai::layout.password.show') }}"
            data-label-hide="{{ __('zairakai::layout.password.hide') }}"
            x-on:click="show = !show"
            :aria-label="show ? $el.dataset.labelHide : $el.dataset.labelShow">
            <span class="msr" x-text="show ? 'visibility_off' : 'visibility'"></span>
        </button>
    </div>
@else
    <x-form.input
        type="password"
        :pattern="$pattern"
        :attributes="$attributes" />
@endif
