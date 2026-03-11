@props([
    'id' => null,
    'class' => null,
    'role' => null,
])

<main
    @if($id) id="{{ $id }}" @endif
    @if($class) class="{{ $class }}" @endif
    @if($role) role="{{ $role }}" @endif>
    {{ $slot }}
</main>
