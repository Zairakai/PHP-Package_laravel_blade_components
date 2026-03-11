@props([
    'src' => null,
    'alt' => null,
    'id' => null,
    'width' => null,
    'height' => null,
    'srcset' => null,
    'sizes' => null,
    'class' => null,
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
    @if($id) id="{{ $id }}" @endif
    src="{{ $src }}"
    alt="{{ $alt }}"
    @if($srcset) srcset="{{ $srcset }}" @endif
    @if($sizes) sizes="{{ $sizes }}" @endif
    @if($width) width="{{ $width }}" @endif
    @if($height) height="{{ $height }}" @endif
    @if($class) class="{{ $class }}" @endif
    @if($crossorigin) crossorigin="{{ $crossorigin }}" @endif
    @if($loading) loading="{{ $loading }}" @endif
    @if($decoding) decoding="{{ $decoding }}" @endif
    @if($fetchpriority) fetchpriority="{{ $fetchpriority }}" @endif
    @if($longdesc) longdesc="{{ $longdesc }}" @endif
    @if($referrerpolicy) referrerpolicy="{{ $referrerpolicy }}" @endif
    @if($ismap) ismap @endif
    @if($usemap) usemap="{{ $usemap }}" @endif >
