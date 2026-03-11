@props([
    'id' => null,
    'class' => null,
    'width' => null,
    'height' => null,
])

<canvas
    @if($id) id="{{ $id }}" @endif
    @if($class) class="{{ $class }}" @endif
    @if($width) width="{{ $width }}" @endif
    @if($height) height="{{ $height }}" @endif>
    {{ $slot }}
</canvas>
