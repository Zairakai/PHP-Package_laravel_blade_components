@props([
    'nonce' => null,
])

@php
    $nonce ??= class_exists(\Illuminate\Support\Facades\Vite::class) && method_exists(\Illuminate\Support\Facades\Vite::class, 'cspNonce')
        ? \Illuminate\Support\Facades\Vite::cspNonce()
        : null;
@endphp

<script @if ($nonce) nonce="{{ $nonce }}" @endif>
    document.addEventListener('click', function (event) {
        var dismiss = event.target.closest('[data-zk-dismiss]');
        if (dismiss) {
            var target = dismiss.closest(dismiss.getAttribute('data-zk-dismiss'));
            if (target) { target.remove(); }
            return;
        }
        var copy = event.target.closest('[data-zk-copy]');
        if (copy) {
            var source = copy.getAttribute('data-zk-copy');
            var text = '#' === source.charAt(0) ? (document.querySelector(source) || {}).textContent || '' : source;
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text.trim()).then(function () {
                    copy.setAttribute('data-copied', '');
                    setTimeout(function () { copy.removeAttribute('data-copied'); }, 2000);
                });
            }
            return;
        }
        var modal = event.target.closest('[data-zk-modal]');
        if (modal) {
            var dialog = document.getElementById(modal.getAttribute('data-zk-modal'));
            if (dialog && dialog.showModal) { dialog.showModal(); }
        }
    });
</script>
