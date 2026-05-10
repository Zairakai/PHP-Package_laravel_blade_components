---
component: zk-column
family: layout
alias: x-zk-column
internal: x-layout.column
---

# zk-column

> Renders a `<div>` with a configurable base class for grid/flex columns.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `col` | `string` | `'col'` | Base CSS class |
| `class` | `string\|null` | `null` | Additional CSS class(es) |

## Examples

### Default column

```blade
<x-zk-row>
    <x-zk-column>Left</x-zk-column>
    <x-zk-column>Right</x-zk-column>
</x-zk-row>
{{-- each column renders: <div class="col">...</div> --}}
```

### Sized column

```blade
<x-zk-column col="col-md-6" class="pe-4">
    Content
</x-zk-column>
```
