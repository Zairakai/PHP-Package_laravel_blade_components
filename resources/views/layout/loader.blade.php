@props([
    'class' => null,
    'loading' => true,
    'status' => '',
])

@if ($loading)
    <div role="status" aria-live="polite" aria-busy="true" {{ $attributes->merge(['class' => trim('loader ' . $class)]) }}>
        <span class="loader-animation" aria-hidden="true"></span>
        <span class="loader-text">{{ $status }}</span>
    </div>
@else
    {{ $slot }}
@endif
