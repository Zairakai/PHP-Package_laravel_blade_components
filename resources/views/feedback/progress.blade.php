@props([
    'class' => null,
    'value' => null,
    'max' => 100,
    'variant' => 'default',
    'circular' => false,
    'label' => null,
])

@php
    $indeterminate = null === $value;
    $percent = $indeterminate ? 25 : max(0, min(100, round(100 * $value / max(1, $max))));
@endphp

@if (! $circular)
    <progress
        data-variant="{{ $variant }}"
        @if ($indeterminate) data-indeterminate @else value="{{ $value }}" @endif
        max="{{ $max }}"
        @if ($label) aria-label="{{ $label }}" @endif
        {{ $attributes->merge(['class' => trim('progress ' . $class)]) }}>{{ $slot }}</progress>
@else
    <div
        role="progressbar"
        aria-valuemin="0"
        aria-valuemax="{{ $max }}"
        @unless ($indeterminate) aria-valuenow="{{ $value }}" @endunless
        @if ($label) aria-label="{{ $label }}" @endif
        data-variant="{{ $variant }}"
        @if ($indeterminate) data-indeterminate @endif
        {{ $attributes->merge(['class' => trim('progress ' . $class)]) }}>
        <svg viewBox="0 0 36 36" aria-hidden="true" focusable="false">
            <circle class="progress-track" cx="18" cy="18" r="16" fill="none"></circle>
            <circle class="progress-bar" cx="18" cy="18" r="16" fill="none" pathLength="100" stroke-dasharray="{{ $percent }} 100"></circle>
        </svg>
        {{ $slot }}
    </div>
@endif
