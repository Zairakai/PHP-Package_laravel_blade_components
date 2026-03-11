@props([
    'id' => null,
    'options' => [],
])

<datalist id="{{ $id }}">
    @foreach ($options as $value => $label)
        <option
            value="{{ $value }}"
            label="{{ $label }}"></option>
    @endforeach
</datalist>
