@props(['class' => null])

<footer {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</footer>
