---
component: zk-pagination
family: layout
alias: x-zk-pagination
internal: x-layout.pagination
---

# zk-pagination

> Renders a `<nav>` with numbered page links. Preserves existing query parameters when navigating.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `currentPage` | `int` | `1` | Currently active page number |
| `totalPages` | `int` | `1` | Total number of pages |
| `pageParam` | `string` | `'page'` | Query parameter name in the URL |
| `ariaLabel` | `string` | `'Pagination'` | `aria-label` on the `<nav>` element |
| `class` | `string\|null` | `null` | CSS class(es) on the `<nav>` element |

## Examples

### Basic

```blade
<x-zk-pagination
    :currentPage="$currentPage"
    :totalPages="$totalPages" />
```

### With search filters preserved

```blade
{{-- URL: /products?search=shoes&page=2 --}}
<x-zk-pagination
    :currentPage="$products->currentPage()"
    :totalPages="$products->lastPage()" />
{{-- Previous/Next links preserve ?search=shoes --}}
```

### Custom query param

```blade
<x-zk-pagination
    :currentPage="$page"
    :totalPages="$total"
    pageParam="p" />
{{-- generates: ?p=2, ?p=3, etc. --}}
```

### With Laravel paginator

```blade
<x-zk-pagination
    :currentPage="$items->currentPage()"
    :totalPages="$items->lastPage()" />
```

## Notes

- URLs are built with `request()->fullUrlWithQuery()` — all existing query parameters are preserved.
- `aria-current="page"` is set on the active page link.
- Previous and Next links are hidden when at the first/last page respectively.
- Labels are translated — see `zairakai::layout.pagination.previous` / `next`.
