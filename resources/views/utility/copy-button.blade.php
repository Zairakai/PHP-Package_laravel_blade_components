@props([
    'class' => null,
    'text' => null,
    'target' => null,
    'label' => 'Copy',
])

@php(app(\Zairakai\LaravelBladeComponents\AssetRegistry::class)->script('copy'))

<button type="button" data-zk-copy="{{ $target ?? $text }}" {{ $attributes->merge(['class' => trim('copy-button ' . $class)]) }}>{{ $slot->isNotEmpty() ? $slot : $label }}</button>
