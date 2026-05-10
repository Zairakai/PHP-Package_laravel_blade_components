@props([
    'src' => null,
    'srcdoc' => null,
    'class' => null,
    'width' => null,
    'height' => null,
    'allow' => null,
    'allowfullscreen' => false,
    'allowpaymentrequest' => false,
    'loading' => null,
    'name' => null,
    'referrerpolicy' => null,
    'sandbox' => null,
])

@php
    $allowfullscreen      = filter_var($allowfullscreen, FILTER_VALIDATE_BOOLEAN);
    $allowpaymentrequest  = filter_var($allowpaymentrequest, FILTER_VALIDATE_BOOLEAN);
@endphp

<iframe
    {{ $attributes->merge(['class' => $class]) }}
    @if($src) src="{{ $src }}" @endif
    @if($srcdoc) srcdoc="{{ $srcdoc }}" @endif
    @if($width) width="{{ $width }}" @endif
    @if($height) height="{{ $height }}" @endif
    @if($allow) allow="{{ $allow }}" @endif
    @if($allowfullscreen) allowfullscreen @endif
    @if($allowpaymentrequest) allowpaymentrequest @endif
    @if($loading) loading="{{ $loading }}" @endif
    @if($name) name="{{ $name }}" @endif
    @if($referrerpolicy) referrerpolicy="{{ $referrerpolicy }}" @endif
    @if($sandbox) sandbox="{{ $sandbox }}" @endif>
    {{ $slot }}
</iframe>
