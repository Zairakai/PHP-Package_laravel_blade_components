@props([
    'class' => null,
    'id',
    'title' => null,
    'message' => null,
    'confirmLabel' => 'OK',
    'cancelLabel' => 'Cancel',
    'alert' => false,
])

@php(app(\Zairakai\LaravelBladeComponents\AssetRegistry::class)->script('modal'))

<dialog
    id="{{ $id }}"
    role="alertdialog"
    @if ($title) aria-labelledby="{{ $id }}-title" @endif
    aria-describedby="{{ $id }}-message"
    closedby="{{ $alert ? 'none' : 'closerequest' }}"
    {{ $attributes->merge(['class' => trim('dialog ' . $class)]) }}>
    @if ($title)
        <h2 id="{{ $id }}-title" class="dialog-title">{{ $title }}</h2>
    @endif
    <p id="{{ $id }}-message" class="dialog-message">{{ $slot->isNotEmpty() ? $slot : $message }}</p>
    <form method="dialog" class="dialog-actions">
        @unless ($alert)
            <button value="cancel" class="dialog-cancel">{{ $cancelLabel }}</button>
        @endunless
        <button value="confirm" class="dialog-confirm" autofocus>{{ $confirmLabel }}</button>
    </form>
</dialog>
