@props([
    'class' => null,
    'modes' => ['light', 'dark', 'system'],
    'labels' => ['light' => 'Light', 'dark' => 'Dark', 'system' => 'System'],
    'label' => 'Theme',
    'storageKey' => 'zk-theme',
    'attribute' => 'data-theme',
    'default' => 'system',
])

@php(app(\Zairakai\LaravelBladeComponents\AssetRegistry::class)->script('theme'))

<div
    role="group"
    aria-label="{{ $label }}"
    data-zk-theme-switcher
    data-storage-key="{{ $storageKey }}"
    data-attribute="{{ $attribute }}"
    data-default="{{ $default }}"
    {{ $attributes->merge(['class' => trim('theme-switcher ' . $class)]) }}>
    @foreach ($modes as $mode)
        <button type="button" class="theme-switcher-option" data-mode="{{ $mode }}" aria-pressed="false">{{ $labels[$mode] ?? $mode }}</button>
    @endforeach
</div>
