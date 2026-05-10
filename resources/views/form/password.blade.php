@props([
    'min'        => config('blade-components.password.min_characters', 8),
    'showToggle' => config('blade-components.password.show_toggle', true),
])

@php
    $pattern    = '^.{' . $min . ',}$';
    $showToggle = filter_var($showToggle, FILTER_VALIDATE_BOOLEAN);

    $hasIconShow = isset($iconShow) && '' !== trim((string) $iconShow);
    $hasIconHide = isset($iconHide) && '' !== trim((string) $iconHide);

    $configIconShow = config('blade-components.password.icon_show', '😳');
    $configIconHide = config('blade-components.password.icon_hide', '🫣');
@endphp

@if ($showToggle)
    <div data-password-toggle>
        <x-form.input
            type="password"
            :pattern="$pattern"
            :attributes="$attributes" />
        <button
            type="button"
            data-toggle-visibility
            aria-label="{{ __('zairakai::layout.password.show') }}"
            data-label-show="{{ __('zairakai::layout.password.show') }}"
            data-label-hide="{{ __('zairakai::layout.password.hide') }}">
            <span data-icon-show>
                @if ($hasIconShow)
                    {{ $iconShow }}
                @elseif ($configIconShow)
                    {!! $configIconShow !!}
                @endif
            </span>
            <span data-icon-hide hidden>
                @if ($hasIconHide)
                    {{ $iconHide }}
                @elseif ($configIconHide)
                    {!! $configIconHide !!}
                @endif
            </span>
        </button>
    </div>

    @once
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-password-toggle]').forEach(function (wrapper) {
            var input    = wrapper.querySelector('input');
            var button   = wrapper.querySelector('[data-toggle-visibility]');
            if (!input || !button) { return; }
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
