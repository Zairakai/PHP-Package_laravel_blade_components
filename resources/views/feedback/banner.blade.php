@props([
    'class' => null,
    'variant' => 'info',
    'dismissible' => false,
    'dismissLabel' => 'Dismiss',
])

<div
    role="{{ in_array($variant, ['warning', 'error'], true) ? 'alert' : 'status' }}"
    data-variant="{{ $variant }}"
    {{ $attributes->merge(['class' => trim('banner ' . $class)]) }}>
    @isset($icon)
        <div class="banner-icon" aria-hidden="true">{{ $icon }}</div>
    @endisset
    <div class="banner-content">{{ $slot }}</div>
    @isset($actions)
        <div class="banner-actions">{{ $actions }}</div>
    @endisset
    @if ($dismissible)
        <button type="button" class="banner-dismiss" aria-label="{{ $dismissLabel }}" data-zk-dismiss=".banner">&times;</button>
    @endif
</div>
