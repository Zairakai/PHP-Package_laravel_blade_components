@props([
    'cite' => null,
    'class' => null,
])

<blockquote
    @if($cite) cite="{{ $cite }}" @endif
    @if($class) class="{{ $class }}" @endif>
    {{ $slot }}
</blockquote>
