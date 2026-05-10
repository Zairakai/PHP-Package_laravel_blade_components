@props([
    "route" => null,
    "routeParams" => [],
    "href" => null,
    "target" => null,
    "rel" => null,
    "id" => null,
    "class" => null,
    "title" => null,
    "ariaLabel" => null,
    "download" => null,
    "referrerpolicy" => null,
    "hreflang" => null,
    "type" => null,
    "msr" => null,
    "iconBefore" => null,
    "iconAfter" => null,
])

@php
    use Zairakai\LaravelBladeComponents\BladeHelpers;

    if (is_null($href) && $route) {
        $href = route($route, $routeParams);

        if (BladeHelpers::routeIs($route)) {
            $class .= " active";
        }
    }

    $needSlotSpan = ! is_null($iconBefore) || ! is_null($msr) || ! is_null($iconAfter);

    $dynamicAttributes = $attributes->filter(fn ($value, $key) => str_starts_with($key, "data-") || (str_starts_with($key, "aria-") && ! ($ariaLabel && "aria-label" === $key)));

    if (is_string($type) && ! BladeHelpers::isValidMimeType($type)) {
        $type = null;
    }
@endphp

<a
    @if($id) id="{{ $id }}" @endif
    href="{{ $href ?? '#' }}"
    @if($target) target="{{ $target }}" @endif
    @if($title) title="{{ $title }}" @endif
    @if($rel) rel="{{ $rel }}" @endif
    @if($class) class="{{ trim($class) }}" @endif
    @if($ariaLabel) aria-label="{{ $ariaLabel }}" @endif
    @if($download) download="{{ $download }}" @endif
    @if($referrerpolicy) referrerpolicy="{{ $referrerpolicy }}" @endif
    @if($hreflang) hreflang="{{ $hreflang }}" @endif
    @if($type) type="{{ $type }}" @endif
    @foreach ($dynamicAttributes as $key => $value)
        {{ $key }}="{{ $value }}"
    @endforeach>
    @if (isset($iconBefore))
        <span class="msr icon-before">{{ $iconBefore }}</span>
    @endif

    @if (! is_null($msr))
        <span class="msr">{{ $msr }}</span>
    @endif

    @if ("" !== trim($slot))
        @if ($needSlotSpan)
            <span>{{ $slot }}</span>
        @else
            {{ $slot }}
        @endif
    @endif

    @if (isset($iconAfter))
        <span class="msr icon-after">{{ $iconAfter }}</span>
    @endif
</a>
