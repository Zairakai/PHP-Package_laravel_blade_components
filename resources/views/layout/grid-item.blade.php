@props(['class' => null])

<div {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</div>
