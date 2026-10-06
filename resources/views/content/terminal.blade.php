@props([
    'class' => null,
    'id' => null,
    'lines' => [],
    'prompt' => '$',
    'title' => null,
    'copyable' => true,
    'copyLabel' => 'Copy',
])

@php
    $rows = array_map(fn ($line) => is_array($line) ? $line : ['type' => 'command', 'text' => $line], $lines);
    $commands = implode("\n", array_column(array_filter($rows, fn ($row) => 'command' === ($row['type'] ?? 'command')), 'text'));
    $id ??= 'terminal-' . substr(md5($commands), 0, 8);
@endphp

@if ($copyable)
    @php(app(\Zairakai\LaravelBladeComponents\AssetRegistry::class)->script('copy'))
@endif

<figure {{ $attributes->merge(['class' => trim('terminal ' . $class)]) }}>
    @if ($title || $copyable)
        <figcaption class="terminal-header">
            @if ($title)
                <span class="terminal-title">{{ $title }}</span>
            @endif
            @if ($copyable)
                <button type="button" class="terminal-copy" data-zk-copy="#{{ $id }}-commands">{{ $copyLabel }}</button>
            @endif
        </figcaption>
    @endif
    <pre class="terminal-body" tabindex="0">@foreach ($rows as $row)<span class="terminal-line" data-type="{{ $row['type'] ?? 'command' }}">@if ('command' === ($row['type'] ?? 'command'))<span class="terminal-prompt" aria-hidden="true">{{ $prompt }} </span>@endif{{ $row['text'] }}</span>{{ "\n" }}@endforeach</pre>
    <span id="{{ $id }}-commands" hidden>{{ $commands }}</span>
</figure>
