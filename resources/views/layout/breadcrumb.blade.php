@props([
    'class' => null,
    'items' => [],
    'ariaLabel' => 'breadcrumb',
])

<nav
    aria-label="{{ $ariaLabel }}"
    {{ $attributes->merge(['class' => $class]) }}>
    <ol class="breadcrumb">
        @foreach ($items as $item)
            <li class="breadcrumb-item">
                @if (isset($item['url']))
                    <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                @else
                    <span @if(isset($item['aria-current']) && ! is_null($item['aria-current'])) aria-current="{{ $item['aria-current'] }}" @endif>{{ $item['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
