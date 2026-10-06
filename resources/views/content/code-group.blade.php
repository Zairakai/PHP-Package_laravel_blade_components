@props([
    'class' => null,
    'id' => null,
    'tabs' => [],
    'label' => 'Code',
])

@php
    app(\Zairakai\LaravelBladeComponents\AssetRegistry::class)->style('code-group');
    $id ??= 'code-group-' . substr(md5(serialize($tabs)), 0, 8);
@endphp

<div role="group" aria-label="{{ $label }}" id="{{ $id }}" {{ $attributes->merge(['class' => trim('code-group ' . $class)]) }}>
    @foreach ($tabs as $index => $tab)
        <input class="code-group-input" type="radio" name="{{ $id }}" id="{{ $id }}-{{ $index }}" @checked(0 === $index)>
        <label class="code-group-tab" for="{{ $id }}-{{ $index }}">{{ $tab['label'] }}</label>
        <div class="code-group-panel">
            <x-zk-code-block :code="$tab['code']" :language="$tab['language'] ?? null" :title="$tab['title'] ?? null" />
        </div>
    @endforeach
</div>
