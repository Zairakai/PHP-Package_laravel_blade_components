@php
    $isContainer = is_array($node) || is_object($node);
    $entries = $isContainer ? (array) $node : [];
    $isList = is_array($node) && array_is_list($node);
    $count = count($entries);
    $type = null === $node ? 'null' : (is_bool($node) ? 'boolean' : (is_int($node) || is_float($node) ? 'number' : (is_string($node) ? 'string' : ($isList ? 'array' : 'object'))));
@endphp

<li class="json-node" data-type="{{ $type }}">
    @if ($isContainer)
        <details @if ($depth < $expanded) open @endif>
            <summary>
                @if (null !== $name)
                    <span class="json-key">{{ $name }}</span>:
                @endif
                <span class="json-summary">{{ $isList ? 'Array(' . $count . ')' : 'Object(' . $count . ')' }}</span>
            </summary>
            <ul class="json-children">
                @foreach ($entries as $key => $child)
                    @include('zairakai::content.json-node', ['name' => $key, 'node' => $child, 'depth' => $depth + 1, 'expanded' => $expanded])
                @endforeach
            </ul>
        </details>
    @else
        @if (null !== $name)
            <span class="json-key">{{ $name }}</span>:
        @endif
        <span class="json-value">{{ null === $node ? 'null' : (is_bool($node) ? ($node ? 'true' : 'false') : (is_string($node) ? '"' . $node . '"' : $node)) }}</span>
    @endif
</li>
