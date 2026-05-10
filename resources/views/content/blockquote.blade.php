@props(['cite' => null, 'class' => null])

<blockquote
    {{ $attributes->merge(['class' => $class]) }}
    @if($cite) cite="{{ $cite }}" @endif>
    {{ $slot }}
</blockquote>
