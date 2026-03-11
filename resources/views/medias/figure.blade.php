@props([
    'id' => null,
    'class' => null,
])

<figure
    @if($id) id="{{ $id }}" @endif
    @if($class) class="{{ $class }}" @endif>
    {{ $slot }}
</figure>
