@props([
    'class' => null,
    'name',
    'value' => null,
    'max' => 5,
    'legend' => null,
])

<fieldset {{ $attributes->merge(['class' => trim('rating-input ' . $class)]) }}>
    @if ($legend)
        <legend>{{ $legend }}</legend>
    @endif
    @for ($star = 1; $star <= $max; $star++)
        <label class="rating-input-star">
            <input type="radio" name="{{ $name }}" value="{{ $star }}" @checked((int) old($name, $value) === $star)>
            <span aria-hidden="true">★</span>
            <span class="visually-hidden">{{ $star }} / {{ $max }}</span>
        </label>
    @endfor
</fieldset>
