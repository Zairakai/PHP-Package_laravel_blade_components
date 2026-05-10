@props(['class' => null, 'container' => true])

@php
    $container = filter_var($container, FILTER_VALIDATE_BOOLEAN);
@endphp

<section {{ $attributes->merge(['class' => $class]) }}>
    @if ($container)
        <x-layout.container>
            {{ $slot }}
        </x-layout.container>
    @else
        {{ $slot }}
    @endif
</section>
