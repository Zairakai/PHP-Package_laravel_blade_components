@props([
    'class' => null,
    'title' => null,
    'time' => null,
    'datetime' => null,
    'variant' => 'default',
])

<li data-variant="{{ $variant }}" {{ $attributes->merge(['class' => trim('timeline-item ' . $class)]) }}>
    <span class="timeline-marker" aria-hidden="true"></span>
    <div class="timeline-content">
        @if ($time)
            <time class="timeline-time" @if ($datetime) datetime="{{ $datetime }}" @endif>{{ $time }}</time>
        @endif
        @if ($title)
            <p class="timeline-title">{{ $title }}</p>
        @endif
        <div class="timeline-body">{{ $slot }}</div>
    </div>
</li>
