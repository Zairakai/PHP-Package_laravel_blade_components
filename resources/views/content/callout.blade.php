@props([
    'class' => null,
    'variant' => 'info',
    'title' => null,
])

<aside role="note" data-variant="{{ $variant }}" {{ $attributes->merge(['class' => trim('callout ' . $class)]) }}>
    <p class="callout-title">
        @isset($icon)
            <span class="callout-icon" aria-hidden="true">{{ $icon }}</span>
        @endisset
        {{ $title ?? ucfirst($variant) }}
    </p>
    <div class="callout-body">{{ $slot }}</div>
</aside>
