@props([
    'class' => null,
    'id' => null,
    'items' => [],
    'thumbnails' => true,
    'closeLabel' => 'Close',
    'openLabel' => 'View {alt}',
])

@php
    app(\Zairakai\LaravelBladeComponents\AssetRegistry::class)->script('modal');
    $id ??= 'lightbox-' . substr(md5(serialize($items)), 0, 8);
@endphp

<div {{ $attributes->merge(['class' => trim('lightbox ' . $class)]) }}>
    @if ($thumbnails)
        <ul class="lightbox-thumbnails" role="list">
            @foreach ($items as $position => $item)
                <li>
                    <button
                        type="button"
                        class="lightbox-thumbnail"
                        commandfor="{{ $id }}-{{ $position + 1 }}"
                        command="show-modal"
                        data-zk-modal="{{ $id }}-{{ $position + 1 }}"
                        aria-label="{{ str_replace('{alt}', $item['alt'] ?? '', $openLabel) }}">
                        <img src="{{ $item['thumbnail'] ?? $item['src'] }}" alt="{{ $item['alt'] ?? '' }}" loading="lazy" decoding="async">
                    </button>
                </li>
            @endforeach
        </ul>
    @endif
    @foreach ($items as $position => $item)
        <dialog id="{{ $id }}-{{ $position + 1 }}" class="lightbox-dialog" aria-label="{{ $item['alt'] ?? 'Image ' . ($position + 1) }}" closedby="any">
            <figure>
                <img src="{{ $item['src'] }}" alt="{{ $item['alt'] ?? '' }}" loading="lazy" decoding="async">
                @if (! empty($item['caption']))
                    <figcaption>{{ $item['caption'] }}</figcaption>
                @endif
            </figure>
            <form method="dialog">
                <button class="lightbox-close" aria-label="{{ $closeLabel }}">&times;</button>
            </form>
        </dialog>
    @endforeach
</div>
