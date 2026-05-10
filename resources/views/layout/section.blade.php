@props(['class' => null])

<section {{ $attributes->merge(['class' => $class]) }}>
    <x-layout.container>
        {{ $slot }}
    </x-layout.container>
</section>
