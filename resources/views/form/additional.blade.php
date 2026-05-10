@props([
    'text' => null,
    'counter' => null,
])

@if(! is_null($text) || ! is_null($counter))
    <div data-additional {{ $attributes }}>
        @if(! is_null($text))
            <span class="supporting-text">{{ $text }}</span>
        @endif
        @if(! is_null($counter))
            <span class="character-counter">{{ $counter }}</span>
        @endif
    </div>
@endif
