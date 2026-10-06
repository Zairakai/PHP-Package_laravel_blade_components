@props([
    'class' => null,
    'name' => 'code',
    'length' => 6,
    'numeric' => true,
])

<input
    type="text"
    name="{{ $name }}"
    inputmode="{{ $numeric ? 'numeric' : 'text' }}"
    autocomplete="one-time-code"
    maxlength="{{ $length }}"
    minlength="{{ $length }}"
    @if ($numeric) pattern="[0-9]{{ '{' . $length . '}' }}" @endif
    {{ $attributes->merge(['class' => trim('otp ' . $class)]) }}>
