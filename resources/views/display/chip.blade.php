@props([
    'class' => null,
    'variant' => 'default',
    'selected' => false,
    'disabled' => false,
    'removeLabel' => 'Remove',
    'removable' => false,
])

<span
    data-variant="{{ $variant }}"
    @if ($selected) data-selected @endif
    @if ($disabled) data-disabled @endif
    {{ $attributes->merge(['class' => trim('chip ' . $class)]) }}>
    @isset($icon)
        <span class="chip-icon" aria-hidden="true">{{ $icon }}</span>
    @endisset
    <span class="chip-label">{{ $slot }}</span>
    @if ($removable)
        <button type="button" class="chip-remove" aria-label="{{ $removeLabel }}" @if ($disabled) disabled @endif>&times;</button>
    @endif
</span>
