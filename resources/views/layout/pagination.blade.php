@props([
    'currentPage' => 1,
    'totalPages' => 1,
    'id' => null,
    'class' => null,
])

<nav
    @if($id) id="{{ $id }}" @endif
    @if($class) class="{{ $class }}" @endif
    aria-label="Pagination">
    <ul class="pagination">
        @if ($currentPage > 1)
            <li class="page-item">
                <a
                    class="page-link"
                    href="?page={{ $currentPage - 1 }}">
                    Previous
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
                    Next
                </a>
            </li>
        @endif
    </ul>
</nav>
