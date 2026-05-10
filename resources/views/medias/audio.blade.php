@props([
    'class' => null,
    'controls' => true,
    'autoplay' => false,
    'loop' => false,
    'muted' => false,
    'preload' => null,
    'sources' => null,
    'tracks' => null,
])

@php
    $controls = filter_var($controls, FILTER_VALIDATE_BOOLEAN);
    $autoplay = filter_var($autoplay, FILTER_VALIDATE_BOOLEAN);
    $loop     = filter_var($loop, FILTER_VALIDATE_BOOLEAN);
    $muted    = filter_var($muted, FILTER_VALIDATE_BOOLEAN);

    if (is_string($sources)) {
        $sources = [['src' => $sources]];
    }

    if (is_string($tracks)) {
        $tracks = [['src' => $tracks]];
    }
@endphp

<audio
    {{ $attributes->merge(['class' => $class]) }}
    @if($controls) controls @endif
    @if($autoplay) autoplay @endif
    @if($loop) loop @endif
    @if($muted) muted @endif
    @if($preload) preload="{{ $preload }}" @endif>
    @if(! is_null($sources))
        @foreach ($sources as $source)
            <x-medias.source
                :src="$source['src']"
                :type="$source['type'] ?? 'audio/webm'"
                :sizes="$source['sizes'] ?? null"
                :media="$source['media'] ?? null"
                :srcset="$source['srcset'] ?? null" />
        @endforeach
    @endif

    @if (! is_null($tracks))
        @foreach ($tracks as $track)
            <x-medias.track
                :src="$track['src'] ?? null"
                :label="$track['label'] ?? null"
                :kind="$track['kind'] ?? null"
                :srclang="$track['srclang'] ?? null"
                :default="$track['default'] ?? false" />
        @endforeach
    @endif

    {{ __('zairakai::layout.medias.audio') }}
</audio>
