@props([
    'id' => null,
    'class' => null,
    'col' => 'col',
])

<div
    @if($id) id="{{ $id }}" @endif
    class="{{ $col }} {{ $class }}">
    {{ $slot }}
</div>
