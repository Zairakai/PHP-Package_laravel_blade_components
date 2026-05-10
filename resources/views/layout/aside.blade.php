@props(['class' => null])

<aside {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</aside>
