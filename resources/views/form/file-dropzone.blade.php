@props([
    'class' => null,
    'name',
    'accept' => null,
    'multiple' => false,
    'required' => false,
    'disabled' => false,
    'label' => 'Drop files here or',
    'browseLabel' => 'browse',
])

<div {{ $attributes->merge(['class' => trim('file-dropzone ' . $class)]) }}>
    <label class="file-dropzone-area">
        <span class="file-dropzone-label">{{ $label }}</span>
        <span class="file-dropzone-browse">{{ $browseLabel }}</span>
        <input
            type="file"
            class="file-dropzone-input"
            name="{{ $name }}@if ($multiple)[]@endif"
            @if ($accept) accept="{{ $accept }}" @endif
            @if ($multiple) multiple @endif
            @if ($required) required @endif
            @if ($disabled) disabled @endif>
    </label>
</div>
