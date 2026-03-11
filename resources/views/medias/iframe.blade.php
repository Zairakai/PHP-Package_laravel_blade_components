@props([
    'id' => null,
    'class' => null,
    'src' => null,
    'srcdoc' => null,
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

<iframe
    @if($id) id="{{ $id }}" @endif
    @if($class) class="{{ $class }}" @endif
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
