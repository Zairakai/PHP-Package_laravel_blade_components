@props([
    'class' => null,
    'keys' => [],
    'separator' => '+',
])

@if ([] === $keys)
    <kbd {{ $attributes->merge(['class' => trim('kbd ' . $class)]) }}>{{ $slot }}</kbd>
@else
    <kbd {{ $attributes->merge(['class' => trim('kbd kbd-combo ' . $class)]) }}>
        @foreach ($keys as $index => $key)
            @if ($index > 0)
                <span class="kbd-separator" aria-hidden="true">{{ $separator }}</span>
            @endif
            <kbd class="kbd-key">{{ $key }}</kbd>
        @endforeach
    </kbd>
@endif
