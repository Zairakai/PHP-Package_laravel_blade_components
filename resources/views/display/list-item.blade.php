@props([
    'class' => null,
    'title' => null,
    'subtitle' => null,
    'href' => null,
    'disabled' => false,
])

<li @if ($disabled) data-disabled @endif {{ $attributes->merge(['class' => trim('list-item ' . $class)]) }}>
    @if ($href && ! $disabled)
        <a href="{{ $href }}" class="list-item-body">
    @else
        <span class="list-item-body" @if ($disabled) aria-disabled="true" @endif>
    @endif
        @isset($prepend)
            <span class="list-item-prepend">{{ $prepend }}</span>
        @endisset
        <span class="list-item-content">
            @if ($title)
                <span class="list-item-title">{{ $title }}</span>
            @endif
            @if ($subtitle)
                <span class="list-item-subtitle">{{ $subtitle }}</span>
            @endif
            {{ $slot }}
        </span>
        @isset($append)
            <span class="list-item-append">{{ $append }}</span>
        @endisset
    @if ($href && ! $disabled)
        </a>
    @else
        </span>
    @endif
</li>
