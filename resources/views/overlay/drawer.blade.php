@props([
    'class' => null,
    'id',
    'title' => null,
    'side' => 'right',
    'closedby' => 'any',
    'closeLabel' => 'Close',
])

@php(app(\Zairakai\LaravelBladeComponents\AssetRegistry::class)->script('modal'))

<dialog
    id="{{ $id }}"
    @if ($title) aria-labelledby="{{ $id }}-title" @endif
    aria-describedby="{{ $id }}-body"
    closedby="{{ $closedby }}"
    data-side="{{ $side }}"
    {{ $attributes->merge(['class' => trim('drawer ' . $class)]) }}>
    <header class="drawer-header">
        @if ($title)
            <h2 id="{{ $id }}-title" class="drawer-title">{{ $title }}</h2>
        @endif
        <form method="dialog">
            <button class="drawer-close" aria-label="{{ $closeLabel }}">&times;</button>
        </form>
    </header>
    <div id="{{ $id }}-body" class="drawer-body">{{ $slot }}</div>
    @isset($footer)
        <footer class="drawer-footer">{{ $footer }}</footer>
    @endisset
</dialog>
