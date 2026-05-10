@props(['class' => null])

<header {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</header>
