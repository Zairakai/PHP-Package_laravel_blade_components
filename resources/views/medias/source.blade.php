@props([
    'src' => null,
    'type' => null,
    'sizes' => null,
    'media' => null,
    'srcset' => null,
])

<source
    {{ $attributes }}
    @if($src) src="{{ $src }}" @endif
    @if($type) type="{{ $type }}" @endif
    @if($sizes) sizes="{{ $sizes }}" @endif
    @if($media) media="{{ $media }}" @endif
    @if($srcset) srcset="{{ $srcset }}" @endif >
