@props([
    'currentPage' => 1,
    'totalPages' => 1,
    'class' => null,
])

<nav
    aria-label="Pagination"
    {{ $attributes->merge(['class' => $class]) }}>
    <ul class="pagination">
        @if ($currentPage > 1)
            <li class="page-item">
                <a
                    class="page-link"
                    href="?page={{ $currentPage - 1 }}">
                    {{ __('zairakai::layout.pagination.previous') }}
                </a>
            </li>
        @endif

        @for ($i = 1; $i <= $totalPages; $i++)
            <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                <a
                    href="?page={{ $i }}"
                    {{ $currentPage == $i ? 'aria-current="page"' : '' }}
                    class="page-link">
                    {{ $i }}
                </a>
            </li>
        @endfor

        @if ($currentPage < $totalPages)
            <li class="page-item">
                <a
                    class="page-link"
                    href="?page={{ $currentPage + 1 }}">
                    {{ __('zairakai::layout.pagination.next') }}
                </a>
            </li>
        @endif
    </ul>
</nav>
