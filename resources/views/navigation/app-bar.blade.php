@props([
    'class' => null,
    'sticky' => false,
])

<header @if ($sticky) data-sticky @endif {{ $attributes->merge(['class' => trim('app-bar ' . $class)]) }}>
    @isset($start)
        <div class="app-bar-start">{{ $start }}</div>
    @endisset
    <div class="app-bar-content">{{ $slot }}</div>
    @isset($end)
        <div class="app-bar-end">{{ $end }}</div>
    @endisset
</header>
