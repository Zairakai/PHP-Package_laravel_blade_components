@props([
    'nonce' => null,
    'features' => [],
])

@php
    $nonce ??= class_exists(\Illuminate\Support\Facades\Vite::class) && method_exists(\Illuminate\Support\Facades\Vite::class, 'cspNonce')
        ? \Illuminate\Support\Facades\Vite::cspNonce()
        : null;
    $code = app(\Zairakai\LaravelBladeComponents\AssetRegistry::class)->scripts(is_string($features) ? preg_split('/[\s,]+/', $features, -1, PREG_SPLIT_NO_EMPTY) : $features);
@endphp

@if ('' !== $code)
<script @if ($nonce) nonce="{{ $nonce }}" @endif>
{!! $code !!}
</script>
@endif
