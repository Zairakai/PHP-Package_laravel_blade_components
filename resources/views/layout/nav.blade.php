@props(['class' => null])

<nav {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</nav>
