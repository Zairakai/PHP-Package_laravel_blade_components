@props([
    'class' => null,
    'id' => null,
    'code' => null,
    'language' => null,
    'title' => null,
    'lineNumbers' => false,
    'highlightLines' => [],
    'wrap' => false,
    'copyable' => true,
    'copyLabel' => 'Copy',
])

@php
    $source = $code ?? trim($slot->toHtml());
    $source = $code ?? html_entity_decode($source, ENT_QUOTES);
    $lines = preg_split('/\r\n|\r|\n/', rtrim((string) $source, "\r\n")) ?: [''];
    $id ??= 'code-' . substr(md5((string) $source), 0, 8);
    $highlighted = is_array($highlightLines) ? $highlightLines : [];
@endphp

@if ($copyable)
    @php(app(\Zairakai\LaravelBladeComponents\AssetRegistry::class)->script('copy'))
@endif

<figure @if ($lineNumbers) data-line-numbers @endif @if ($wrap) data-wrap @endif {{ $attributes->merge(['class' => trim('code-block ' . $class)]) }}>
    @if ($title || $language || $copyable)
        <figcaption class="code-block-header">
            @if ($title)
                <span class="code-block-title">{{ $title }}</span>
            @endif
            @if ($language)
                <span class="code-block-language">{{ $language }}</span>
            @endif
            @if ($copyable)
                <button type="button" class="code-block-copy" data-zk-copy="#{{ $id }}">{{ $copyLabel }}</button>
            @endif
        </figcaption>
    @endif
    <pre class="code-block-pre" tabindex="0"><code id="{{ $id }}" @if ($language) class="language-{{ $language }}" @endif>@foreach ($lines as $number => $line)<span class="code-line" @if (in_array($number + 1, $highlighted, true)) data-highlight @endif data-line="{{ $number + 1 }}">{{ $line }}</span>{{ "\n" }}@endforeach</code></pre>
</figure>
