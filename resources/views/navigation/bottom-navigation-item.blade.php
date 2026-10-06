@props([
    'class' => null,
    'href',
    'label' => null,
    'active' => false,
])

<a href="{{ $href }}" @if ($active) aria-current="page" @endif {{ $attributes->merge(['class' => trim('bottom-navigation-item ' . $class)]) }}>
    @isset($icon)
        <span class="bottom-navigation-icon" aria-hidden="true">{{ $icon }}</span>
    @endisset
    <span class="bottom-navigation-label">{{ $label ?? $slot }}</span>
</a>
