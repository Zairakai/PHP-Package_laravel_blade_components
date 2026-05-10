@props(['class' => null])

<article {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</article>
