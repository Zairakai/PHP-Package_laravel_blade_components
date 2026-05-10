@props(['class' => null])

<p {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</p>
