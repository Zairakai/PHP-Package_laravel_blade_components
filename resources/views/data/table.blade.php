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
    'perPage' => null,
    'pageParameter' => 'page',
    'paginationLabel' => 'Pagination',
])

@php
    $sort ??= request()->query($sortParameter);
    $direction ??= request()->query($directionParameter, 'asc');

    // A paginator brings its page; a list is cut here when perPage is given.
    $currentPage = 1;
    $lastPage = 1;

    if ($rows instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator) {
        $currentPage = $rows->currentPage();
        $lastPage = $rows->lastPage();
        $rows = $rows->items();
    } elseif ($rows instanceof \Illuminate\Contracts\Pagination\Paginator) {
        $currentPage = $rows->currentPage();
        $lastPage = $rows->hasMorePages() ? $currentPage + 1 : $currentPage;
        $rows = $rows->items();
    } elseif (null !== $perPage && $perPage > 0) {
        $all = collect($rows)->values();
        $lastPage = max(1, (int) ceil($all->count() / $perPage));
        $currentPage = max(1, min($lastPage, (int) request()->query($pageParameter, 1)));
        $rows = $all->slice(($currentPage - 1) * $perPage, $perPage)->all();
    }
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
                            <a class="data-table-sort" href="{{ request()->fullUrlWithQuery([$sortParameter => $column['key'], $directionParameter => $sorted && 'asc' === $direction ? 'desc' : 'asc', $pageParameter => null]) }}">{{ $column['label'] }}</a>
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
    @if ($lastPage > 1)
        <x-zk-pagination :current-page="$currentPage" :total-pages="$lastPage" :page-param="$pageParameter" :aria-label="$paginationLabel" class="data-table-pagination" />
    @endif
</div>
