@props([
    'class' => null,
    'label' => null,
    'value' => null,
    'change' => null,
    'sentiment' => null,
])

@php
    $direction = null === $change ? null : ($change > 0 ? 'up' : ($change < 0 ? 'down' : 'flat'));
    $sentiment ??= 'up' === $direction ? 'positive' : ('down' === $direction ? 'negative' : 'neutral');
@endphp

<div {{ $attributes->merge(['class' => trim('stat ' . $class)]) }}>
    <dl class="stat-list">
        <dt class="stat-label">{{ $label }}</dt>
        <dd class="stat-value">{{ $slot->isNotEmpty() ? $slot : $value }}</dd>
    </dl>
    @if (null !== $change)
        <p class="stat-change" data-direction="{{ $direction }}" data-sentiment="{{ $sentiment }}">
            <span class="stat-arrow" aria-hidden="true">{{ 'up' === $direction ? '▲' : ('down' === $direction ? '▼' : '–') }}</span>
            <span class="stat-change-text">{{ $change > 0 ? '+' : '' }}{{ $change }}%</span>
        </p>
    @endif
</div>
