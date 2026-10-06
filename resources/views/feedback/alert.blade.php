@props([
    'class' => null,
    'variant' => 'info',
    'title' => null,
    'dismissible' => false,
    'closeLabel' => 'Close',
])

@if ($dismissible)
    @php(app(\Zairakai\LaravelBladeComponents\AssetRegistry::class)->script('dismiss'))
@endif

<div
    role="{{ in_array($variant, ['warning', 'error'], true) ? 'alert' : 'status' }}"
    data-variant="{{ $variant }}"
    {{ $attributes->merge(['class' => trim('alert ' . $class)]) }}>
    @isset($icon)
        <span class="alert-icon">{{ $icon }}</span>
    @endisset
    <div class="alert-body">
        @if ($title)
            <p class="alert-title">{{ $title }}</p>
        @endif
        <div class="alert-content">{{ $slot }}</div>
    </div>
    @isset($actions)
        <div class="alert-actions">{{ $actions }}</div>
    @endisset
    @if ($dismissible)
        <button type="button" class="alert-close" aria-label="{{ $closeLabel }}" data-zk-dismiss=".alert">&times;</button>
    @endif
</div>
