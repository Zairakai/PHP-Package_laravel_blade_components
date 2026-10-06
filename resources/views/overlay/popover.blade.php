@props([
    'class' => null,
    'id',
    'mode' => 'auto',
    'label' => null,
    'placement' => 'bottom',
])

<span class="popover-wrapper">
    <button type="button" class="popover-trigger" popovertarget="{{ $id }}">{{ $trigger }}</button>
    <div
        id="{{ $id }}"
        popover="{{ $mode }}"
        @if ($label) aria-label="{{ $label }}" @endif
        data-placement="{{ $placement }}"
        {{ $attributes->merge(['class' => trim('popover ' . $class)]) }}>{{ $slot }}</div>
</span>
