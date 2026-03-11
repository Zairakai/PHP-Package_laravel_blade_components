@props([
    'id' => null,
    'class' => null,
    'role' => null,
])

<aside
    @if($id) id="{{ $id }}" @endif
    @if($class) class="{{ $class }}" @endif
    @if($role) role="{{ $role }}" @endif>
    {{ $slot }}
</aside>
