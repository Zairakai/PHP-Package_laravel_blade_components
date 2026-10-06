@props([
    'class' => null,
    'id' => null,
    'value' => null,
    'expanded' => 1,
    'label' => 'JSON',
    'copyable' => true,
    'copyLabel' => 'Copy',
])

@php
    $id ??= 'json-' . substr(md5(json_encode($value)), 0, 8);
@endphp

@if ($copyable)
    @php(app(\Zairakai\LaravelBladeComponents\AssetRegistry::class)->script('copy'))
@endif

<div role="group" aria-label="{{ $label }}" {{ $attributes->merge(['class' => trim('json-viewer ' . $class)]) }}>
    @if ($copyable)
        <button type="button" class="json-copy" data-zk-copy="#{{ $id }}-source">{{ $copyLabel }}</button>
        <span id="{{ $id }}-source" hidden>{{ json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) }}</span>
    @endif
    <ul class="json-root">
        @include('zairakai::content.json-node', ['name' => null, 'node' => $value, 'depth' => 0, 'expanded' => $expanded])
    </ul>
</div>
