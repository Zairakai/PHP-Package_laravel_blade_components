@props([
    'class' => null,
    'steps' => [],
    'current' => 1,
    'label' => null,
])

<ol @if ($label) aria-label="{{ $label }}" @endif {{ $attributes->merge(['class' => trim('stepper ' . $class)]) }}>
    @foreach ($steps as $index => $step)
        @php
            $number = $index + 1;
            $state = $number < $current ? 'complete' : ($number === $current ? 'current' : 'upcoming');
            $title = is_array($step) ? ($step['label'] ?? '') : $step;
            $description = is_array($step) ? ($step['description'] ?? null) : null;
        @endphp
        <li class="step" data-state="{{ $state }}" @if ('current' === $state) aria-current="step" @endif>
            <span class="step-marker" aria-hidden="true">{{ $number }}</span>
            <span class="step-label">{{ $title }}</span>
            @if ($description)
                <span class="step-description">{{ $description }}</span>
            @endif
        </li>
    @endforeach
</ol>
