@props([
    'min'        => config('blade-components.password.min_characters', 8),
    'showToggle' => config('blade-components.password.show_toggle', true),
])

@php
    $pattern    = '^.{' . $min . ',}$';
    $showToggle = filter_var($showToggle, FILTER_VALIDATE_BOOLEAN);

    $hasIconShow = isset($iconShow) && '' !== trim((string) $iconShow);
    $hasIconHide = isset($iconHide) && '' !== trim((string) $iconHide);

    $configIconShow = config('blade-components.password.icon_show', '');
    $configIconHide = config('blade-components.password.icon_hide', '');

    $resolvedIconShow = $hasIconShow ? $iconShow : $configIconShow;
    $resolvedIconHide = $hasIconHide ? $iconHide : $configIconHide;
@endphp

@if ($showToggle)
    @once
        @include('zairakai::icons.sprite')
    @endonce

    @php
        // Rendered separately and passed as trailingContent so the button
        // lands inside x-form.input's [data-input] box only — scoped exactly
        // to the input row, never mirrored into the label (unlike
        // iconBefore/iconAfter) and never affected by a validation message
        // rendered below it at the x-form.field level (see
        // [data-password-toggle] CSS in the consuming app for the
        // positioning half of this fix).
        $toggleButton = view('zairakai::form.password-toggle-button', [
            'iconShow' => $resolvedIconShow,
            'iconHide' => $resolvedIconHide,
        ])->render();
    @endphp

    <div data-password-toggle>
        <x-form.input
            type="password"
            :pattern="$pattern"
            :trailingContent="$toggleButton"
            :attributes="$attributes" />
    </div>

    @once
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-toggle-visibility]').forEach(function (button) {
            var wrapper = button.closest('[data-input]');
            var input   = wrapper ? wrapper.querySelector('input') : null;
            if (!input) { return; }
            var iconShow = button.querySelector('[data-icon-show]');
            var iconHide = button.querySelector('[data-icon-hide]');
            button.addEventListener('click', function () {
                var isPassword = 'password' === input.type;
                input.type = isPassword ? 'text' : 'password';
                button.setAttribute('aria-label', isPassword ? button.dataset.labelHide : button.dataset.labelShow);
                if (iconShow) { iconShow.hidden = isPassword; }
                if (iconHide) { iconHide.hidden = !isPassword; }
            });
        });
    });
    </script>
    @endonce
@else
    <x-form.input
        type="password"
        :pattern="$pattern"
        :attributes="$attributes" />
@endif
