@props([
    'class' => null,
    'title' => null,
    'text' => null,
    'url' => null,
    'label' => 'Share',
    'copiedLabel' => 'Link copied',
])

@php(app(\Zairakai\LaravelBladeComponents\AssetRegistry::class)->script('share'))

<button
    type="button"
    data-zk-share
    @if ($title) data-title="{{ $title }}" @endif
    @if ($text) data-text="{{ $text }}" @endif
    @if ($url) data-url="{{ $url }}" @endif
    data-copied-label="{{ $copiedLabel }}"
    {{ $attributes->merge(['class' => trim('share-button ' . $class)]) }}>
    {{ $slot->isNotEmpty() ? $slot : $label }}
    <span class="share-button-status" role="status"></span>
</button>
