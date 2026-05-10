@props([
    'src' => null,
    'label' => null,
    'default' => false,
    'kind' => null,
    'srclang' => null,
])

<track
    {{ $attributes }}
    @if($src) src="{{ $src }}" @endif
    @if($label) label="{{ $label }}" @endif
    @if(isset($default) && $default) default @endif
    @if($kind) kind="{{ $kind }}" @endif
    @if($srclang) srclang="{{ $srclang }}" @endif >
