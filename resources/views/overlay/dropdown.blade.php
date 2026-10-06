@props([
    'class' => null,
    'id',
    'label' => null,
    'placement' => 'bottom-start',
])

<span class="dropdown-wrapper">
    <button type="button" class="dropdown-trigger" popovertarget="{{ $id }}" aria-haspopup="true">{{ $trigger }}</button>
    <div
        id="{{ $id }}"
        popover
        @if ($label) aria-label="{{ $label }}" @endif
        data-placement="{{ $placement }}"
        {{ $attributes->merge(['class' => trim('dropdown dropdown-menu ' . $class)]) }}>{{ $slot }}</div>
</span>
