@props([
    'id' => null,
    'options' => [],
])

<datalist {{ $attributes->merge(['id' => $id])->filter(fn ($v) => ! is_null($v)) }}>
    @foreach ($options as $value => $label)
        <option
            value="{{ $value }}"
            label="{{ $label }}"></option>
    @endforeach
</datalist>
