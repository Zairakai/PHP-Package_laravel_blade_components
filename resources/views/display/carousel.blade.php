@props([
    'class' => null,
    'id' => null,
    'label' => null,
    'items' => [],
    'controls' => true,
    'indicators' => true,
    'autoplay' => 0,
    'loop' => true,
    'previousLabel' => 'Previous slide',
    'nextLabel' => 'Next slide',
    'slideLabel' => '{n} of {total}',
])

@php
    $registry = app(\Zairakai\LaravelBladeComponents\AssetRegistry::class);
    $registry->style('carousel');
    $total = count($items);
    $id ??= 'carousel-' . substr(md5(serialize(array_map('strval', $items)) . $label . $slot->toHtml()), 0, 8);

    if ($total > 0 && ($controls || $indicators || $autoplay > 0)) {
        $registry->script('carousel');
    }
@endphp

<div
    id="{{ $id }}"
    role="region"
    aria-roledescription="carousel"
    @if ($label) aria-label="{{ $label }}" @endif
    aria-live="polite"
    data-zk-carousel
    @if ($autoplay > 0) data-autoplay="{{ $autoplay }}" @endif
    data-loop="{{ $loop ? 'true' : 'false' }}"
    {{ $attributes->merge(['class' => trim('carousel ' . $class)]) }}>
    <div class="carousel-track" tabindex="0">
        @foreach ($items as $position => $item)
            <div
                id="{{ $id }}-slide-{{ $position + 1 }}"
                role="group"
                aria-roledescription="slide"
                aria-label="{{ str_replace(['{n}', '{total}'], [$position + 1, $total], $slideLabel) }}"
                class="carousel-slide">{{ $item }}</div>
        @endforeach
        {{ $slot }}
    </div>
    @if ($total > 1 && $controls)
        <div class="carousel-controls">
            <button type="button" class="carousel-previous" aria-label="{{ $previousLabel }}" data-zk-carousel-previous hidden>&lsaquo;</button>
            <button type="button" class="carousel-next" aria-label="{{ $nextLabel }}" data-zk-carousel-next hidden>&rsaquo;</button>
        </div>
    @endif
    @if ($total > 1 && $indicators)
        <nav class="carousel-indicators" aria-label="{{ $label ?? 'Slides' }}">
            @foreach ($items as $position => $item)
                <a class="carousel-indicator" href="#{{ $id }}-slide-{{ $position + 1 }}" aria-label="{{ str_replace(['{n}', '{total}'], [$position + 1, $total], $slideLabel) }}"></a>
            @endforeach
        </nav>
    @endif
</div>
