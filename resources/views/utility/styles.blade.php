@props([
    'nonce' => null,
    'features' => [],
])

@php
    $nonce ??= class_exists(\Illuminate\Support\Facades\Vite::class) && method_exists(\Illuminate\Support\Facades\Vite::class, 'cspNonce')
        ? \Illuminate\Support\Facades\Vite::cspNonce()
        : null;
    $css = app(\Zairakai\LaravelBladeComponents\AssetRegistry::class)->styles(is_string($features) ? preg_split('/[\s,]+/', $features, -1, PREG_SPLIT_NO_EMPTY) : $features);
@endphp

@if ('' !== $css)
<style @if ($nonce) nonce="{{ $nonce }}" @endif>
{!! $css !!}
</style>
@endif
