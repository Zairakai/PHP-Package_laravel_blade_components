@props([
    'class' => null,
    'target',
    'showDays' => false,
    'units' => ['days' => 'd', 'hours' => 'h', 'minutes' => 'm', 'seconds' => 's'],
])

@php
    app(\Zairakai\LaravelBladeComponents\AssetRegistry::class)->script('countdown');
    $until = \Illuminate\Support\Carbon::parse($target);
    $left = max(0, now()->diffInSeconds($until, false));
    $left = (int) floor($left);
    $parts = ['days' => intdiv($left, 86400), 'hours' => intdiv($left, 3600) % 24, 'minutes' => intdiv($left, 60) % 60, 'seconds' => $left % 60];
@endphp

<time datetime="PT{{ $left }}S" data-zk-countdown="{{ $until->toIso8601String() }}" {{ $attributes->merge(['class' => trim('countdown ' . $class)]) }}>
    @foreach ($parts as $unit => $value)
        @if ('days' !== $unit || $showDays || $value > 0)
            <span class="countdown-part" data-unit="{{ $unit }}" data-suffix="{{ $units[$unit] ?? '' }}">{{ 'days' === $unit ? $value : str_pad((string) $value, 2, '0', STR_PAD_LEFT) }}{{ $units[$unit] ?? '' }}</span>
        @endif
    @endforeach
</time>
