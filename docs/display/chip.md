---
component: zk-chip
family: display
alias: x-zk-chip
internal: x-display.chip
---

# zk-chip

> A compact tag, with an icon and a remove button.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `variant` | `string` | `'default'` | `data-variant` |
| `selected` | `bool` | `false` | Adds `data-selected` |
| `disabled` | `bool` | `false` | Adds `data-disabled` and disables the remove button |
| `removable` | `bool` | `false` | Shows the remove button |
| `removeLabel` | `string` | `'Remove'` | Accessible name of the remove button |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Label |
| `icon` | Icon before the label |

The remove button has no behaviour: give it yours (`form`, Livewire, a script).

## Examples

### Removable

```blade
<x-zk-chip :removable="true" remove-label="Remove Laravel">Laravel</x-zk-chip>
```
