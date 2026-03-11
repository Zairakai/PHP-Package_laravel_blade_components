@props([
    'id' => null,
    'class' => null,
    'items' => [],
])

<nav
    aria-label="breadcrumb"
    @if($id) id="{{ $id }}" @endif
    @if($class) class="{{ $class }}" @endif>
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
