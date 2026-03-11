@props([
    'legend' => null,
    'legendBefore' => false,
    'class' => null,
])

<fieldset @if($class) class="{{ $class }}" @endif>
    @if ($legend && $legendBefore)
        <legend>{{ $legend }}</legend>
    @endif

    {{ $slot }}

    @if ($legend && ! $legendBefore)
        <legend>{{ $legend }}</legend>
    @endif
</fieldset>
