---
component: zk-row
family: layout
alias: x-zk-row
internal: x-layout.row
---

# zk-row

> Renders a `<div>` with a configurable base class for flex rows.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `row` | `string` | `'row'` | Base CSS class |
| `class` | `string\|null` | `null` | Additional CSS class(es) |

## Examples

### Default row

```blade
<x-zk-row>
    <x-zk-column>Left</x-zk-column>
    <x-zk-column>Right</x-zk-column>
</x-zk-row>
{{-- renders: <div class="row">...</div> --}}
```

### Custom base class

```blade
<x-zk-row row="flex" class="gap-4">
    ...
</x-zk-row>
{{-- renders: <div class="flex gap-4">...</div> --}}
```
