@props([
    'name' => null,
    'id' => null,
    'label' => null,
    'class' => null,
    'msr' => null,
    'iconBefore' => null,
    'iconAfter' => null,
    'prefix' => null,
    'suffix' => null,
])

@php
    $forTarget = $id ?? $name;
@endphp

<label
    {{ $attributes->merge(['class' => $class]) }}
    @if($forTarget) for="{{ $forTarget }}" @endif>
    @if ($iconBefore)
        <span data-leading-icon>{{ $iconBefore }}</span>
    @endif

    @if ($prefix)
        <span data-prefix>{{ $prefix }}</span>
    @endif

    @if (! is_null($label) && ! is_null($name))
        <span data-content>
            <span>{{ $label }}</span>
        </span>
    @elseif (! is_null($msr))
        <span
            data-content
            class="msr">
            {{ $msr }}
        </span>
    @endif

    @if ($suffix)
        <span data-suffix>{{ $suffix }}</span>
    @endif

    @if ($iconAfter)
        <span data-trailing-icon>{{ $iconAfter }}</span>
    @endif
</label>
