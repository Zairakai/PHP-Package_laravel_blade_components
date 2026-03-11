@props([
    'id' => null,
    'class' => null,
    'data' => null,
    'type' => null,
    'width' => null,
    'height' => null,
    'name' => null,
    'form' => null,
])

<object
    @if($id) id="{{ $id }}" @endif
    @if($class) class="{{ $class }}" @endif
    @if($data) data="{{ $data }}" @endif
    @if($type) type="{{ $type }}" @endif
    @if($width) width="{{ $width }}" @endif
    @if($height) height="{{ $height }}" @endif
    @if($name) name="{{ $name }}" @endif
    @if($form) form="{{ $form }}" @endif>
    {{ $slot }}
</object>
