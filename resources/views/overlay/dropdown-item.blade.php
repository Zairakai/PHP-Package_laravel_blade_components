@props([
    'class' => null,
    'href' => null,
    'disabled' => false,
])

@if ($href && ! $disabled)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => trim('dropdown-item ' . $class)]) }}>{{ $slot }}</a>
@else
    <button type="button" @if ($disabled) disabled @endif {{ $attributes->merge(['class' => trim('dropdown-item ' . $class)]) }}>{{ $slot }}</button>
@endif
