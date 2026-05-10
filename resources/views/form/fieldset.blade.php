@props([
    'legend' => null,
    'legendBefore' => false,
    'class' => null,
])

@php
    $legendBefore = filter_var($legendBefore, FILTER_VALIDATE_BOOLEAN);
@endphp

<fieldset {{ $attributes->merge(['class' => $class]) }}>
    @if ($legend && $legendBefore)
        <legend>{{ $legend }}</legend>
    @endif

    {{ $slot }}

    @if ($legend && ! $legendBefore)
        <legend>{{ $legend }}</legend>
    @endif
</fieldset>
