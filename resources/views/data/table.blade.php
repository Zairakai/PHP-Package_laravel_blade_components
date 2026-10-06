@props([
    'class' => null,
    'columns' => [],
    'rows' => [],
    'caption' => null,
    'sort' => null,
    'direction' => null,
    'sortParameter' => 'sort',
    'directionParameter' => 'dir',
    'emptyText' => 'Nothing to show',
])

@php
    $sort ??= request()->query($sortParameter);
    $direction ??= request()->query($directionParameter, 'asc');
@endphp

<div class="data-table-wrapper">
    <table {{ $attributes->merge(['class' => trim('data-table ' . $class)]) }}>
        @if ($caption)
            <caption>{{ $caption }}</caption>
        @endif
        <thead>
            <tr>
                @foreach ($columns as $column)
                    @php
                        $sorted = ! empty($column['sortable']) && $sort === $column['key'];
                    @endphp
                    <th
                        scope="col"
                        data-column="{{ $column['key'] }}"
                        @if (! empty($column['align'])) data-align="{{ $column['align'] }}" @endif
                        @if ($sorted) aria-sort="{{ 'desc' === $direction ? 'descending' : 'ascending' }}" @endif>
                        @if (! empty($column['sortable']))
                            <a class="data-table-sort" href="{{ request()->fullUrlWithQuery([$sortParameter => $column['key'], $directionParameter => $sorted && 'asc' === $direction ? 'desc' : 'asc', 'page' => null]) }}">{{ $column['label'] }}</a>
                        @else
                            {{ $column['label'] }}
                        @endif
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse ($rows as $row)
                <tr>
                    @foreach ($columns as $column)
                        <td data-column="{{ $column['key'] }}" @if (! empty($column['align'])) data-align="{{ $column['align'] }}" @endif>{{ data_get($row, $column['key']) }}</td>
                    @endforeach
                </tr>
            @empty
                <tr class="data-table-empty">
                    <td colspan="{{ max(1, count($columns)) }}">{{ $emptyText }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
