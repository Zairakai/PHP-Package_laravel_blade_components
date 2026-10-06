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
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

The headers of the sortable columns are links to the same page with `?sort=…&dir=…` (and `page` removed), and the sorted one has `aria-sort`. Sorting, searching and paging are done by your query: the component only shows the result. Use [zk-pagination](../layout/pagination.md) for the pages. The search, filters, selection and client-side mode of the Vue table are not ported. No script.

## Examples

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
