@props([
    'id' => null,
    'class' => null,
])

<p
    @if($id) id="{{ $id }}" @endif
    @if($class) class="{{ $class }}" @endif>
    {{ $slot }}
</p>
