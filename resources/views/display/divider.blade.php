@props([
    'class' => null,
    'orientation' => 'horizontal',
])

@if ('horizontal' === $orientation && $slot->isEmpty())
    <hr data-orientation="horizontal" {{ $attributes->merge(['class' => trim('divider ' . $class)]) }}>
@else
    <div
        role="separator"
        aria-orientation="{{ $orientation }}"
        data-orientation="{{ $orientation }}"
        {{ $attributes->merge(['class' => trim('divider ' . $class)]) }}>
        @if ($slot->isNotEmpty())
            <span class="divider-label">{{ $slot }}</span>
        @endif
    </div>
@endif
