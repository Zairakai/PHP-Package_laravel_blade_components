@props([
    'class' => null,
    'variant' => 'text',
    'count' => 1,
    'width' => null,
    'height' => null,
    'animated' => true,
])

@php
    $style = trim(($width ? 'width: ' . $width . ';' : '') . ($height ? ' height: ' . $height . ';' : ''));
@endphp

@if ($count > 1)
    <div class="skeleton-group" aria-busy="true">
        @for ($index = 0; $index < $count; $index++)
            <span aria-hidden="true" data-variant="{{ $variant }}" @if ($animated) data-animated @endif @if ($style) style="{{ $style }}" @endif {{ $attributes->merge(['class' => trim('skeleton ' . $class)]) }}></span>
        @endfor
    </div>
@else
    <span aria-hidden="true" data-variant="{{ $variant }}" @if ($animated) data-animated @endif @if ($style) style="{{ $style }}" @endif {{ $attributes->merge(['class' => trim('skeleton ' . $class)]) }}></span>
@endif
