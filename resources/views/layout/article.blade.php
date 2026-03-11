@props([
    'id' => null,
    'class' => null,
    'lang' => null,
    'role' => null,
])

<article
    @if($id) id="{{ $id }}" @endif
    @if($class) class="{{ $class }}" @endif
    @if($lang) lang="{{ $lang }}" @endif
    @if($role) role="{{ $role }}" @endif>
    {{ $slot }}
</article>
