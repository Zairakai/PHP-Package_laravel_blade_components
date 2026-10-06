@props([
    'class' => null,
    'variant' => 'info',
    'closeLabel' => 'Close',
    'dismissible' => true,
])

<div
    role="{{ in_array($variant, ['warning', 'error'], true) ? 'alert' : 'status' }}"
    data-variant="{{ $variant }}"
    {{ $attributes->merge(['class' => trim('toast ' . $class)]) }}>
    <div class="toast-body">{{ $slot }}</div>
    @if ($dismissible)
        <button type="button" class="toast-close" aria-label="{{ $closeLabel }}" data-zk-dismiss=".toast">&times;</button>
    @endif
</div>
