@props([
    'data' => null,
    'type' => null,
    'class' => null,
    'width' => null,
    'height' => null,
    'name' => null,
    'form' => null,
])

<object
    {{ $attributes->merge(['class' => $class]) }}
    @if($data) data="{{ $data }}" @endif
    @if($type) type="{{ $type }}" @endif
    @if($width) width="{{ $width }}" @endif
    @if($height) height="{{ $height }}" @endif
    @if($name) name="{{ $name }}" @endif
    @if($form) form="{{ $form }}" @endif>
    {{ $slot }}
</object>
