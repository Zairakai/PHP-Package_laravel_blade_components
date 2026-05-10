@props(['class' => null, 'width' => null, 'height' => null])

<canvas
    {{ $attributes->merge(['class' => $class]) }}
    @if($width) width="{{ $width }}" @endif
    @if($height) height="{{ $height }}" @endif>
    {{ $slot }}
</canvas>
