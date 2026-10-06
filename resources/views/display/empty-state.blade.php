@props([
    'class' => null,
    'title' => null,
    'description' => null,
])

<div {{ $attributes->merge(['class' => trim('empty-state ' . $class)]) }}>
    @isset($icon)
        <div class="empty-state-icon" aria-hidden="true">{{ $icon }}</div>
    @endisset
    @if ($title)
        <p class="empty-state-title">{{ $title }}</p>
    @endif
    @if ($description || $slot->isNotEmpty())
        <p class="empty-state-description">{{ $slot->isNotEmpty() ? $slot : $description }}</p>
    @endif
    @isset($actions)
        <div class="empty-state-actions">{{ $actions }}</div>
    @endisset
</div>
