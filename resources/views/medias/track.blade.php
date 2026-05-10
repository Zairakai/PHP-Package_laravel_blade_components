@props([
    'src' => null,
    'label' => null,
    'default' => false,
    'kind' => null,
    'srclang' => null,
])

@php
    $default = filter_var($default, FILTER_VALIDATE_BOOLEAN);
@endphp

<track
    {{ $attributes }}
    @if($src) src="{{ $src }}" @endif
    @if($label) label="{{ $label }}" @endif
    @if(isset($default) && $default) default @endif
    @if($kind) kind="{{ $kind }}" @endif
    @if($srclang) srclang="{{ $srclang }}" @endif >
