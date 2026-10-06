@props([
    'class' => null,
    'title' => null,
    'open' => false,
    'name' => null,
    'level' => 3,
    'disabled' => false,
])

<details
    @if ($name) name="{{ $name }}" @endif
    @if ($open) open @endif
    @if ($disabled) data-disabled @endif
    {{ $attributes->merge(['class' => trim('accordion-item ' . $class)]) }}>
    <summary class="accordion-trigger" @if ($disabled) aria-disabled="true" @endif>
        <h{{ $level }} class="accordion-header">{{ $header ?? $title }}</h{{ $level }}>
    </summary>
    <div class="accordion-panel">{{ $slot }}</div>
</details>
