@props([
    'src' => null,
    'alt' => null,
    'class' => null,
    'width' => null,
    'height' => null,
    'srcset' => null,
    'sizes' => null,
    'crossorigin' => null,
    'loading' => null,
    'decoding' => null,
    'fetchpriority' => null,
    'longdesc' => null,
    'referrerpolicy' => null,
    'ismap' => false,
    'usemap' => null,
])

@php
    if (
        ! is_null($crossorigin) &&
        ! in_array($crossorigin, ['anonymous', 'use-credentials'])
    ) {
        $crossorigin = null;
    }
@endphp

<img
    {{ $attributes->merge(['class' => $class]) }}
    src="{{ $src }}"
    alt="{{ $alt }}"
    @if($srcset) srcset="{{ $srcset }}" @endif
    @if($sizes) sizes="{{ $sizes }}" @endif
    @if($width) width="{{ $width }}" @endif
    @if($height) height="{{ $height }}" @endif
    @if($crossorigin) crossorigin="{{ $crossorigin }}" @endif
    @if($loading) loading="{{ $loading }}" @endif
    @if($decoding) decoding="{{ $decoding }}" @endif
    @if($fetchpriority) fetchpriority="{{ $fetchpriority }}" @endif
    @if($longdesc) longdesc="{{ $longdesc }}" @endif
    @if($referrerpolicy) referrerpolicy="{{ $referrerpolicy }}" @endif
    @if($ismap) ismap @endif
    @if($usemap) usemap="{{ $usemap }}" @endif >
