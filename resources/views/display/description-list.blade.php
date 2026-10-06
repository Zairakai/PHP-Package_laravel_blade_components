@props([
    'class' => null,
    'items' => [],
])

<dl {{ $attributes->merge(['class' => trim('description-list ' . $class)]) }}>
    @foreach ($items as $term => $description)
        <div class="description-list-item">
            <dt>{{ $term }}</dt>
            <dd>{{ $description }}</dd>
        </div>
    @endforeach
    {{ $slot }}
</dl>
