---
component: zk-table
family: data
alias: x-zk-table
internal: x-data.table
---

# zk-table

> A table with a caption, sortable columns (links) and an empty state, rendered by the server.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `columns` | `array` | `[]` | Items with `key`, `label` and, optionally, `sortable` and `align` |
| `rows` | `iterable` | `[]` | Arrays or objects, read with `data_get($row, $column['key'])` |
| `caption` | `string\|null` | `null` | Caption |
| `sort` | `string\|null` | `null` | Current column; by default `?sort=` |
| `direction` | `string\|null` | `null` | `asc` or `desc`; by default `?dir=` |
| `sortParameter` | `string` | `'sort'` | Name of the query parameter |
| `directionParameter` | `string` | `'dir'` | Name of the query parameter |
| `emptyText` | `string` | `'Nothing to show'` | Text of the empty row |
| `perPage` | `int\|null` | `null` | Rows per page: cuts a list and shows the pagination under the table |
| `pageParameter` | `string` | `'page'` | Name of the query parameter of the page |
| `paginationLabel` | `string` | `'Pagination'` | Accessible name of the pagination |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

The headers of the sortable columns are links to the same page with `?sort=…&dir=…` (and `page` removed), and the sorted one has `aria-sort`. Sorting, searching and paging are done by your query: the component only shows the result. The pages: give a Laravel paginator as `rows` (`paginate()`, `simplePaginate()`) and its page is shown with [zk-pagination](../layout/pagination.md) under the table, or give a list and `perPage` and the table cuts it by `?page=`. With one page there is no pagination. The search, filters and selection of the Vue table are not ported. No script.

## Examples

### With a paginator

```blade
<x-zk-table :columns="$columns" :rows="$users->withQueryString()" />
```

### A list cut in pages

```blade
<x-zk-table :columns="$columns" :rows="$countries" :per-page="15" />
```

### Users

```blade
<x-zk-table
    caption="Users"
    :columns="[
        ['key' => 'name', 'label' => 'Name', 'sortable' => true],
        ['key' => 'email', 'label' => 'Email'],
    ]"
    :rows="$users"
/>
```
