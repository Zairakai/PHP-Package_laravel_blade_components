---
component: zk-chip-group
family: display
alias: x-zk-chip-group
internal: x-display.chip-group
---

# zk-chip-group

> A group of chips.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `label` | `string\|null` | `null` | Accessible name |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | The `zk-chip` elements |

A `<div role="group">`. The selection of the Vue component is not ported: use checkboxes or links.

## Examples

### Tags

```blade
<x-zk-chip-group label="Tags">
    <x-zk-chip>Laravel</x-zk-chip>
    <x-zk-chip>Blade</x-zk-chip>
</x-zk-chip-group>
```
