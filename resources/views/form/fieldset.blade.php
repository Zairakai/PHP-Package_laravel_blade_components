@props([
    'legend' => null,
    'legendBefore' => false,
    'class' => null,
])

<fieldset {{ $attributes->merge(['class' => $class]) }}>
    @if ($legend && $legendBefore)
        <legend>{{ $legend }}</legend>
    @endif

    {{ $slot }}

    @if ($legend && ! $legendBefore)
        <legend>{{ $legend }}</legend>
    @endif
</fieldset>
