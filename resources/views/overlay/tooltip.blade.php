@props([
    'class' => null,
    'id',
    'text' => null,
    'placement' => 'top',
])

<span class="tooltip-wrapper">
    {{ $slot }}
    <span
        id="{{ $id }}"
        role="tooltip"
        data-placement="{{ $placement }}"
        {{ $attributes->merge(['class' => trim('tooltip ' . $class)]) }}>{{ $text }}</span>
</span>
