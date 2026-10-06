@props([
    'class' => null,
    'label' => null,
    'open' => false,
])

<li {{ $attributes->merge(['class' => trim('tree-item ' . $class)]) }}>
    @if ($slot->isNotEmpty())
        <details @if ($open) open @endif>
            <summary class="tree-label">{{ $label }}</summary>
            <ul class="tree-group">{{ $slot }}</ul>
        </details>
    @else
        <span class="tree-label">{{ $label }}</span>
    @endif
</li>
