@props([
    'class' => null,
    'text' => null,
    'allowHtml' => false,
])

<div {{ $attributes->merge(['class' => trim('markdown ' . $class)]) }}>{!! \Illuminate\Support\Str::markdown((string) ($text ?? $slot->toHtml()), ['html_input' => $allowHtml ? 'allow' : 'strip', 'allow_unsafe_links' => false]) !!}</div>
