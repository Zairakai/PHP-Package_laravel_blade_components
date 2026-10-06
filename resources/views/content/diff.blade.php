@props([
    'class' => null,
    'diff' => '',
    'lineNumbers' => true,
    'title' => null,
])

@php
    $oldNumber = 0;
    $newNumber = 0;
    $rows = [];

    foreach (preg_split('/\r\n|\r|\n/', rtrim((string) $diff, "\r\n")) ?: [] as $line) {
        if (1 === preg_match('/^@@ -(\d+)(?:,\d+)? \+(\d+)/', $line, $hunk)) {
            $oldNumber = (int) $hunk[1];
            $newNumber = (int) $hunk[2];
            $rows[] = ['type' => 'hunk', 'text' => $line, 'old' => null, 'new' => null];
        } elseif (str_starts_with($line, '+++') || str_starts_with($line, '---') || str_starts_with($line, 'diff ') || str_starts_with($line, 'index ')) {
            $rows[] = ['type' => 'meta', 'text' => $line, 'old' => null, 'new' => null];
        } elseif (str_starts_with($line, '+')) {
            $rows[] = ['type' => 'add', 'text' => substr($line, 1), 'old' => null, 'new' => $newNumber++];
        } elseif (str_starts_with($line, '-')) {
            $rows[] = ['type' => 'remove', 'text' => substr($line, 1), 'old' => $oldNumber++, 'new' => null];
        } else {
            $rows[] = ['type' => 'context', 'text' => str_starts_with($line, ' ') ? substr($line, 1) : $line, 'old' => $oldNumber++, 'new' => $newNumber++];
        }
    }
@endphp

<figure {{ $attributes->merge(['class' => trim('diff ' . $class)]) }}>
    @if ($title)
        <figcaption class="diff-title">{{ $title }}</figcaption>
    @endif
    <pre class="diff-body" tabindex="0">@foreach ($rows as $row)@php($tag = 'add' === $row['type'] ? 'ins' : ('remove' === $row['type'] ? 'del' : 'span'))<{{ $tag }} class="diff-line" data-type="{{ $row['type'] }}">@if ($lineNumbers)<span class="diff-number" aria-hidden="true" data-old="{{ $row['old'] }}" data-new="{{ $row['new'] }}"></span>@endif<span class="diff-text">{{ $row['text'] }}</span></{{ $tag }}>{{ "\n" }}@endforeach</pre>
</figure>
