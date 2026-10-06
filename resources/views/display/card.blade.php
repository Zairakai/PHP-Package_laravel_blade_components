@props([
    'class' => null,
    'as' => 'div',
    'title' => null,
])

<{{ $as }} {{ $attributes->merge(['class' => trim('card ' . $class)]) }}>
    @if (isset($header) || $title)
        <header class="card-header">{{ $header ?? $title }}</header>
    @endif
    <div class="card-body">{{ $slot }}</div>
    @isset($footer)
        <footer class="card-footer">{{ $footer }}</footer>
    @endisset
</{{ $as }}>
