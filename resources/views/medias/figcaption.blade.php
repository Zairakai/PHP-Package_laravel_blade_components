@props(['id' => null, 'class' => null])

<figcaption {{ $attributes->merge(['id' => $id, 'class' => $class])->filter(fn ($v) => ! is_null($v)) }}>
    {{ $slot }}
</figcaption>
