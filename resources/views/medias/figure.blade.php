@props(['class' => null])

<figure {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</figure>
