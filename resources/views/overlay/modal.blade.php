@props([
    'class' => null,
    'id',
    'title' => null,
    'alert' => false,
    'closedby' => 'any',
    'closeLabel' => 'Close',
])

@php(app(\Zairakai\LaravelBladeComponents\AssetRegistry::class)->script('modal'))

<dialog
    id="{{ $id }}"
    @if ($alert) role="alertdialog" @endif
    @if ($title) aria-labelledby="{{ $id }}-title" @endif
    aria-describedby="{{ $id }}-body"
    closedby="{{ $closedby }}"
    {{ $attributes->merge(['class' => trim('modal ' . $class)]) }}>
    <header class="modal-header">
        @if ($title)
            <h2 id="{{ $id }}-title" class="modal-title">{{ $title }}</h2>
        @endif
        <form method="dialog">
            <button class="modal-close" aria-label="{{ $closeLabel }}">&times;</button>
        </form>
    </header>
    <div id="{{ $id }}-body" class="modal-body">{{ $slot }}</div>
    @isset($footer)
        <footer class="modal-footer">{{ $footer }}</footer>
    @endisset
</dialog>
