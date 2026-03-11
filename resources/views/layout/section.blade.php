@props([
    'id' => null,
    'class' => null,
    'lang' => null,
    'role' => null,
])

<section
    @if($id) id="{{ $id }}" @endif
    @if($class) class="{{ $class }}" @endif
    @if($lang) lang="{{ $lang }}" @endif
    @if($role) role="{{ $role }}" @endif>
    <x-layout.container>
        {{ $slot }}
    </x-layout.container>
</section>
