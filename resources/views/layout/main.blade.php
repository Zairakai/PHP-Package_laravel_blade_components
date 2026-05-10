@props(['class' => null])

<main {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</main>
